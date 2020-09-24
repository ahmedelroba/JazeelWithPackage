<?php

namespace Uxbert\Gamification\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uxbert\Gamification\Http\Requests\API\Reward\CreateRewardRequest;
use Uxbert\Gamification\Http\Requests\API\Reward\UpdateRewardRequest;
use Uxbert\Gamification\Http\Resources\Jazeel\StatusCollection;
use Uxbert\Gamification\Http\Resources\Reward\RewardResource;
use Uxbert\Gamification\Models\Reward;
use Uxbert\Gamification\Helpers\Helper;
use Uxbert\Gamification\Models\Client;
use Uxbert\Gamification\Models\Sponsor;

class RewardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $reward = Reward::where('client_id', $checking->id)->get();
            return RewardResource::collection($reward);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $reward = Reward::where('client_id', $checking->id)->Where('name', 'LIKE', '%' . $request->name . '%')->get();
            return RewardResource::collection($reward);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->reward_key)) {
            $reward = Reward::where('client_id', $checking->id)->where('key', $request->reward_key)->first();
            return new RewardResource($reward);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRewardRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $fileInputName = 'image';
            $fileMedia = null;
            if ($request->hasFile($fileInputName))
                $fileMedia = (string) Helper::UpdateFile($request, 'uploads/rewards/' . Helper::GenerateRandomString() . '/' . Helper::GenerateRandomString() . '/', $fileInputName);
            
            $sponsor = Sponsor::where('client_id', $checking->id)->where('key', $request->sponsor_key)->first();
            if(!$sponsor)
                return (new StatusCollection(false, 'You entered wrong sponser key.'))->response()->setStatusCode(401);

            $random_key = Helper::unique_random('sponsors', 'key');
            $reward = Reward::create([
                'name'          => utf8_encode($request->name),
                'description'   => utf8_encode($request->description),
                'image'         => $fileMedia,
                'key'           => $random_key,
                'quantity'      => $request->quantity,
                'sponsor_id'    => $sponsor->id,
                'client_id'     => $checking->id
            ]);
            return new RewardResource($reward);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaderBoard  $leaderBoard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRewardRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->reward_key)) {
            $reward = Reward::where('client_id', $checking->id)->where('key', $request->reward_key)->first();
            $fileInputName= 'image';
            $fileMedia = null;
            if ($request->hasFile($fileInputName))
                $fileMedia = (string) Helper::UpdateFile($request, 'uploads/sponsors/' . Helper::GenerateRandomString() . '/' . Helper::GenerateRandomString() . '/', $fileInputName, $reward->image);

            if ($request->sponsor_key != "") {
                $sponsor = Sponsor::where('client_id', $checking->id)->where('key', $request->sponsor_key)->first();
                if(!$sponsor)
                    return (new StatusCollection(false, 'You entered wrong sponser key.'))->response()->setStatusCode(401);
            }

            $reward->name           = utf8_encode($request->name);
            $reward->description    = utf8_encode($request->description);
            $reward->image          = $fileMedia ?? $reward->image;
            $reward->quantity       =  $request->quantity;
            $reward->sponsor_id     = $request->sponsor_key != "" ?  $sponsor->id : $reward->sponsor_id;
            $reward->save();
            return new RewardResource($reward);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaderBoard  $leaderBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->reward_key)) {
            $reward = Reward::where('client_id', $checking->id)->where('key', $request->reward_key)->first();
            $reward->delete();
            return (new StatusCollection(true, 'You are deleted Reward successfully.'))->response()->setStatusCode(200);
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
