<?php

namespace Uxbert\Gamification\Listeners;

use Uxbert\Gamification\Events\ActionRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Uxbert\Gamification\Models\LeaderBoard;
use Uxbert\Gamification\Models\LeaderBoardRecord;
use Illuminate\Support\Facades\Log;
  use Illuminate\Support\Facades\Redis;

class UpdateLeaderboards implements ShouldQueue
{

    public function __construct()
    {
        Log::info('Showing Update Leaderboards ');
        //
    }

    public function handle(ActionRegistered $event)
    {
        // Code here to update leaderboards 
        $action_record = $event->action_record;
        Log::info('Showing Update Leaderboards ');
        // // find all leaderboard for this user in the client id 
        // $leaderboards = LeaderBoard::where('client_id', $action_record->client_id)->whereHas('records', function($q) use($action_record) {
        //         $q->where('user_id', '=', $action_record->user_id);
        //     })->get();
        // // loop all leaderboards
        // foreach ($leaderboards as $leaderboard) {
        //     $allRecords = LeaderBoardRecord::where(['leaderboard_id' => $leaderBoard->id, 'client_id' => $action_record->client_id])->orderBy('points', 'desc', 'natural')->get();
        //     $rank = 1;
        //     // update ranks 
        //     foreach($allRecords as  $oneRecord){
        //         $oneRecord->rank = $rank;
        //         $oneRecord->save();
        //         $rank = $rank + 1;
        //     }
        // }


    }

}