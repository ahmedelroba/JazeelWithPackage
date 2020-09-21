<?php

namespace Uxbert\Gamification\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uxbert\Gamification\Http\Requests\API\Leaderboard\CreateLeaderboardRequest;
use Uxbert\Gamification\Http\Resources\Jazeel\StatusCollection;
use Uxbert\Gamification\Http\Resources\Leaderboard\LeaderboardRecordsResource;
use Uxbert\Gamification\Http\Resources\Leaderboard\LeaderboardResource;
use Uxbert\Gamification\Models\LeaderBoard;
use Uxbert\Gamification\Helpers\Helper;
use Uxbert\Gamification\Models\Client;

class LeaderBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                    return LeaderboardResource::collection(["1", "2"]);
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $leaderboard = LeaderBoard::where('client_id', $checking->id)->get();
            return LeaderboardResource::collection($leaderboard);
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
            $leaderboard = LeaderBoard::where('client_id', $checking->id)->Where('name', 'LIKE', '%' . $request->name . '%')->get();
            return LeaderboardResource::collection($leaderboard);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }


    /**
     * Show a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(CreateLeaderboardRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->leaderboard_key)) {
            $reward = LeaderBoard::where('client_id', $checking->id)->where('key', $request->leaderboard_key)->first();
            return new LeaderboardResource($reward);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLeaderboardRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            // JSON string
            $rewards = '[
                    {"rank":"1", "user_key":"male", "reward_key":"male"},
                    {"rank":"2", "user_key":"male", "reward_key":"male"},
                    {"rank":"3", "user_key":"male", "reward_key":"male"},
                ]';
            $random_key = Helper::unique_random('sponsors', 'key');
            $reward = Reward::create([
                'name'          => utf8_encode($request->name),
                'description'   => utf8_encode($request->description),
                'key'           => $random_key,
                'date_from'     => $request->date_from,
                'date_to'       => $request->date_to,
                'terms'         => $request->terms,
                'rewards'       => $rewards,
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
    public function update(CreateLeaderboardRequest $request)
    {
        return new LeaderboardResource(['1']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaderBoard  $leaderBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return (new StatusCollection(true, 'You are deleted leaderboard successfully.'))->response()->setStatusCode(200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLeaderboardsOfUser()
    {
        return LeaderboardRecordsResource::collection(['1', '2', '3']);
    }
}
