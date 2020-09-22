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
use Uxbert\Gamification\Models\Reward;
use Uxbert\Gamification\Models\Client_User;

class LeaderBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return LeaderboardResource::collection(["1", "2"]);
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
    public function find(Request $request)
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

            $rewards = explode(",", $request->reward_key);
            $ranks = explode(",", $request->Rank);
            if (count($rewards) != count($ranks))
                return (new StatusCollection(false, 'Please make sure from rewards count must be equal ranks count.'))->response()->setStatusCode(401);

            $rewardsJsonArray = array();
            foreach($rewards as $key => $value) {
                $reward = Reward::where('key', $value)->first();
                if (isset($reward->id))
                    $rewardsJsonArray[] = array('reward_id' => $reward->id, 'rank' => $ranks[$key]);
            }
            
            $random_key = Helper::unique_random('leaderboards', 'key');
            $leaderboard = LeaderBoard::create([
                'name'          => utf8_encode($request->name),
                'description'   => utf8_encode($request->description),
                'key'           => $random_key,
                'date_from'     => $request->date_from,
                'date_to'       => $request->date_to,
                'terms'         => $request->terms,
                'rewards'       => json_encode($rewardsJsonArray),
                'client_id'     => $checking->id
            ]);
            return new LeaderboardResource($leaderboard);
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
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->leaderboard_key)) {
            $leaderboard = LeaderBoard::where('client_id', $checking->id)->where('key', $request->leaderboard_key)->first();
            
            $rewards = explode(",", $request->reward_key);
            $ranks = explode(",", $request->Rank);
            if (count($rewards) != count($ranks))
                return (new StatusCollection(false, 'Please make sure from rewards count must be equal ranks count.'))->response()->setStatusCode(401);

            $rewardsJsonArray = array();
            foreach($rewards as $key => $value) {
                $rewardsJsonArray[] = array('reward_key' => $value, 'rank' => $ranks[$key]);
            }
            return $ranks;

            $leaderboard->name          = utf8_encode($request->name);
            $leaderboard->description   = utf8_encode($request->description);
            $leaderboard->date_from     = $request->date_from;
            $leaderboard->date_to       = $request->date_to;
            $leaderboard->rewards       = json_encode($rewardsJsonArray);
            $leaderboard->terms         = $request->terms;
            $leaderboard->save();
            return new LeaderboardResource($leaderboard);
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
        return (new StatusCollection(true, 'You are deleted leaderboard successfully.'))->response()->setStatusCode(200);
    }

    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFackRecords(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $leaderBoard = LeaderBoard::where('client_id', $checking->id)->where('key', $request->leaderboard_key)->first();
            $users = explode(",", $request->users_key);
            foreach($users as $key => $value){
                $user = Client_User::where('referral_key', $value)->first();
                $record = LeaderBoardRecord::create([
                    'user_name' => $user->first_name . ' ' . $user->last_name, 
                    'points' => rand(1, 9999), 
                    'rank' => rand(1, 9999), 
                    'user_id' => $user->id, 
                    'leaderboard_id' => $leaderBoard->id, 
                    'client_id' => $checking->id
                ]);
            }

            $allRecords = LeaderBoardRecord::where(['leaderboard_id' => $leaderBoard->id, 'client_id' => $checking->id])->orderByAsc('points')->get();
            $rank = 1;
            foreach($allRecords as  $oneRecord){
                $oneRecord->rank = $rank;
                $oneRecord->save();
                $rank = $rank + 1;
            }
            return (new StatusCollection(true, 'We are added fake data.'))->response()->setStatusCode(200);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function closeLeaderboards()
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $leaderBoard = LeaderBoard::where('client_id', $checking->id)->where('key', $request->leaderboard_key)->first();
            return (new StatusCollection(true, 'We are closed leaderboard Successfully.'))->response()->setStatusCode(200);
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
