<?php

namespace Uxbert\Gamification\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


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
use Uxbert\Gamification\Http\Resources\User\BalanceResource;
use Uxbert\Gamification\Http\Resources\Leaderboard\LeaderboardResource;
use Uxbert\Gamification\Http\Resources\User\UserPointsRecordsResource;
use Uxbert\Gamification\Http\Resources\Leaderboard\LeaderboardWithWinnersResource;

// Models
use App\User;
use Uxbert\Gamification\Models\Client;
use Uxbert\Gamification\Models\Client_User;
use Uxbert\Gamification\Models\Action;
use Uxbert\Gamification\Models\ActionRecord;
use Uxbert\Gamification\Models\ClientPoints;
use Uxbert\Gamification\Models\UserJoiningClient;
use Uxbert\Gamification\Models\LeaderBoard;




class UsersController extends Controller
{
    /**
     * Creating new user in brand.
     *
     * @param  string client_id
     * @param  string client_secret
     * @param  string first_name
     * @param  string last_name
     * @param  string email
     * @param  string password
     * @return \Illuminate\Http\Response
     */
    public function create_new_user(CreateUserRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            // check if user already registered in another brand
            $user_account = User::where('email', $request->email)->first();
            $user = Client_User::where('email', $request->email)->first();
            if (!empty($user) && !empty($user_account)) {
                // check if user already registered in the brand
                $checkRelation = UserJoiningClient::where('client_id', $checking->id)->where('user_id', $user->id)->first();
                if (!empty($checkRelation))
                    return new UserResource($user);
                // Reigster user in this brand
                $user->clients()->attach($checking->id);
                UserJoiningClient::create([
                    'client_id' => $checking->id,
                    'user_id' => $user->id,
                ]);
                return new UserResource($user);
            }
            $referral_key = Helper::unique_random('client_users', 'referral_key');
            // delete everything for this user
            User::where('email', $request->email)->delete();
            Client_User::where('email', $request->email)->delete();

            // make user account for login with it into user dashboard
            $user_account = User::create([
                'name'          => utf8_encode($request->first_name),
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'timezone'      => 'Asia/Riyadh',
                'type'          => 'user'
            ]);

            // Reigster new user and relate it with brand
            $client_user = Client_User::create([
                'first_name'    => utf8_encode($request->first_name),
                'last_name'     => utf8_encode($request->last_name),
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'city'          => utf8_encode($request->city),
                'country'       => utf8_encode($request->country),
                'phone'         => $request->phone,
                'referral_key'  => $referral_key,
                'user_id'       => $user_account->id,
                'active'        => 1
            ]);
            $client_user->clients()->attach($checking->id);
            UserJoiningClient::create([
                'client_id'  => $checking->id,
                'user_id'   => $client_user->id,
            ]);
            return new UserResource($client_user);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }


    /**
     * Brands can add lot of actions for users for give them points and make users history.
     *
     * @param string client_id
     * @param string client_secret
     * @param string referral_key
     * @param string action_key
     * @return \Illuminate\Http\Response
     */
    public function add_points(AddNewBrandUserActionRequest $request)
    {
        Log::info('Add Points FUNCTION: ');
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $action = Action::where('client_id', $checking->id)->where('key', $request->action_key)->first();
            if (!empty($action)) {
                $user = Client_User::where('referral_key', $request->user_referral_key)->first();
                $userIsJoindInThisBrand = UserJoiningClient::where('client_id', $checking->id)->where('user_id', $user->id)->first();
                if (empty($user) || empty($userIsJoindInThisBrand))
                    return (new StatusCollection(false, 'User not found in your user list.'))->response()->setStatusCode(401);

                // checking if user have points or not
                if ($action->type == "minus") {
                    $userCurrentPoints  = ActionRecord::where('client_id', $checking->id)->where('user_id', $user->id)->get()->sum('current_points');
                    if ($userCurrentPoints < $action->points)
                        return (new StatusCollection(false, 'User don\'t have enuogh points.'))->response()->setStatusCode(401);
                }

                // checking if brand have points or not
                $allPointsOfAllUsersInbrand = (int) ClientPoints::where('client_id', $checking->id)->get()->sum('points');
                $allPointsUsersEarned = (int) ActionRecord::where('client_id', $checking->id)->where('type', 'plus')->get()->sum('current_points');
                $brandCurrentPoints =  $allPointsOfAllUsersInbrand -  $allPointsUsersEarned;
                if ($brandCurrentPoints < $action->points)
                    return (new StatusCollection(false, 'Brand don\'t have any points please contact jazeel and recharge brand points.'))->response()->setStatusCode(401);

                $minusSign = $action->type == "minus" ? '-' : '';
                ActionRecord::create([
                    'user_id'               => $user->id,
                    'action_id'             => $action->id,
                    'current_points'        => $minusSign . $action->points,
                    'type'                  => $action->type,
                    'client_id'             => $checking->id,
                    'description'           => $request->description ?? '',
                    'element_id'            => $request->element_id ?? '',
                    'element_type'          => $request->element_type ?? '',
                ]);
                return (new StatusCollection(true, 'You are added new action for your user successfully.', $action->points))->response()->setStatusCode(200);
            } else
                return (new StatusCollection(false, 'Please enter correct action key.'))->response()->setStatusCode(401);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Show all brand's users points history.
     *
     * @param string client_id
     * @param string client_secret
     * @param string referral_key
     */
    public function action_records(BrandUserPointRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $user = Client_User::where('referral_key', $request->user_referral_key)->first();
            $user_points_history = ActionRecord::where('client_id', $checking->id)->where('user_id', $user->id)->get();
            return UserPointsRecordsResource::collection($user_points_history);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }


    public function getLeaderboards(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $user = Client_User::where('referral_key', $request->user_referral_key)->first();
            if(empty($user))
                return (new StatusCollection(false, 'Please enter correct user_referral_key.'))->response()->setStatusCode(401);

            $leaderboard = LeaderBoard::where('client_id', $checking->id)->whereHas('records', function($q) use($user) {
                $q->where('user_id', '=', $user->id);
            })->get();
            return LeaderboardResource::collection($leaderboard);
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
    public function getBalance(BrandUserPointRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $user = Client_User::where('referral_key', $request->user_referral_key)->first();
            if (!empty($user))
                return new BalanceResource($user, $checking->id, $user->id);
            else
                return (new StatusCollection(false, 'Please enter correct user_id.'))->response()->setStatusCode(401);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }


    /**
     * Show a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findLeaderboard(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->leaderboard_key)) {
            $user = Client_User::where('referral_key', $request->user_referral_key)->first();
            $leaderboard = LeaderBoard::where('client_id', $checking->id)->where('key', $request->leaderboard_key)
                                        ->whereHas('records', function($q) use ($user) {
                                            $q->where('user_id', '=', $user->id);
                                        })->first();
            if (!$leaderboard)
                return (new StatusCollection(false, 'This user is not joined in this leaderboard.'))->response()->setStatusCode(401);
            
            if ($request->leaderboard_key != "all")
                return new LeaderboardWithWinnersResource($reward);
            else
                return new LeaderboardResource($reward);
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
