<?php

namespace Uxbert\Gamification\Http\Controllers\API;

use Uxbert\Gamification\Helpers\Helper;
use App\Http\Controllers\Controller;
use Uxbert\Gamification\Http\Requests\Jazeel\AddNewBrandUserActionRequest;
use Uxbert\Gamification\Http\Requests\Jazeel\BrandUserPointRequest;
use Uxbert\Gamification\Http\Requests\Jazeel\CreateBrandActionRequest;
use Uxbert\Gamification\Http\Requests\Jazeel\CreateNewBrandRequest;
use Uxbert\Gamification\Http\Requests\Jazeel\CreateUserRequest;
use Uxbert\Gamification\Http\Requests\Jazeel\GettingAllBrandActionsRequest;
use Uxbert\Gamification\Http\Resources\Jazeel\BrandActionResource;
use Uxbert\Gamification\Http\Resources\Jazeel\BrandResource;
use Uxbert\Gamification\Http\Resources\Jazeel\StatusCollection;
use Uxbert\Gamification\Http\Resources\Jazeel\UserResource;
use Uxbert\Gamification\Http\Resources\Jazeel\UserPointsResource;
use Uxbert\Gamification\Http\Resources\Jazeel\UserPointsHistoryResource;
use Uxbert\Gamification\Http\Resources\Jazeel\UserWithHistoryResource;
use Uxbert\Gamification\Models\Client;
use Uxbert\Gamification\Models\Client_User;
use Uxbert\Gamification\Models\Action;
use Uxbert\Gamification\Models\ActionRecord;
use Uxbert\Gamification\Models\ClientPoints;
use Uxbert\Gamification\Models\UserJoiningClient;
// Models
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// Jazeel Integration System
class JazeelApiController extends Controller
{

    /**
     * You can create a new brand without creating it from backend.
     *
     * @param string Name
     * @param string Description
     * @param string URL
     * @param string Username
     * @param string Job_Title
     * @param string Email
     * @param string Password
     * @param string Industry
     * @param string City
     * @param string Country
     * @return \Illuminate\Http\Response
     */
    public function create_new_brand(CreateNewBrandRequest $request)
    {
        $client_id = 'BRAND-' . md5(uniqid(rand(), true)) . time();
        $client_secret = 'SECRET_' . sha1(uniqid(rand(), true)) . time();
        // creating user account
        $user = User::create([
            'first_name' => utf8_encode($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'timezone' => 'Asia/Riyadh',
            'type' => 'brand'
        ]);

        // creating ingetration brand account
        $client = Client::create([
            'name' => utf8_encode($request->name),
            'description' => utf8_encode($request->description),
            'url' => $request->url,
            'phone' => $request->phone,
            'username' => $request->username,
            'job_title' => utf8_encode($request->job_title),
            'email' => $request->email,
            'industry' => $request->industry,
            'country' => $request->country,
            'city' => $request->city,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'user_id' => $user->id,
            'status' => 'active'
        ]);

        ClientPoints::create([
            'client_id' => $client->id,
            'description' => 'When everyone register new account he must be getting 2000 points',
            'points' => '20000',
            'type' => 'plus',
        ]);
        
        $leaderboard = LeaderBoard::create([
            'name'          => 'All Time Leaderboard',
            'description'   => 'In this leaderboard we are listing all time ranking and points ',
            'key'           => 'all_time',
            'date_from'     => $request->date_from,
            'date_to'       => $request->date_to,
            'terms'         => $request->terms,
            'rewards'       => json_encode($rewardsJsonArray),
            'client_id'     => $checking->id
        ]);
        
        return (new BrandResource($client));
    }

    /**
     * Brands can getting list of all action in brand.
     *
     * @param string client_id
     * @param string client_secret
     * @return \Illuminate\Http\Response
     */
    public function getting_all_brand_action(GettingAllBrandActionsRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $actions = Action::where('client_id', $checking->_id)->get();
            return BrandActionResource::collection($actions);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Show all brand's users points counts.
     *
     * @param string client_id
     * @param string client_secret
     * @param string referral_key
     * @return {
     *      'Total Points',
     *      'Current Points',
     *      'Withdrawn Points',
     * }
     */
    public function show_user_points(BrandUserPointRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $user = Client_User::where('referral_key', $request->user_referral_key)->first();
            if (!empty($user))
                return new UserPointsResource($user);
            else
                return (new StatusCollection(false, 'Please enter correct user_id.'))->response()->setStatusCode(401);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }


    /**
     * Show all brand's users points history.
     *
     * @param string client_id
     * @param string client_secret
     */
    public function top_users_have_points(GettingAllBrandActionsRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $users = UserJoiningClient::where('client_id', $checking->id)->get();
            $users =  Client_User::whereHas('clients', function ($q) use ($checking) {
                $q->where('_id', $checking->id);
            })->orderByDesc('total_current_points')->get();
            return UserResource::collection($users);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Show all brand's users points history.
     *
     * @param string client_id
     * @param string client_secret
     */
    public function top_users_got_points(GettingAllBrandActionsRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $users =  Client_User::whereHas('clients', function ($q) use ($checking) {
                $q->where('_id', $checking->id);
            })->orderByDesc('total_earned_points')->get();
            return UserResource::collection($users);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Show all brand's users points history.
     *
     * @param string client_id
     * @param string client_secret
     * @param string brand_action_key
     */
    public function top_users_by_brand_action(GettingAllBrandActionsRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $action = Action::where('key', $request->brand_action_key)->first();
            if (empty($action))
                return (new StatusCollection(false, 'Please enter correct brand action.'))->response()->setStatusCode(401);

            $users =  Client_User::whereHas('clients', function ($q) use ($checking) {
                $q->where('_id', $checking->id);
            })->with(['allpoints' => function ($q) use ($action) {
                $q->where('action_id', $action->id);
            }])->orderByDesc('total_earned_points')->get();

            return UserWithHistoryResource::collection($users);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }


    /**
     * This function for checking Client id and Client Secret.
     *
     * @param Request request
     */
    private function checkingClientIdAndSecret($request)
    {
        return Client::where('client_id', $request->client_id)->where('client_secret', $request->client_secret)->first();
    }
}
