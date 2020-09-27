<?php

namespace Uxbert\Gamification\Events;

use Uxbert\Gamification\Models\ActionRecord;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\Log;
use Uxbert\Gamification\Models\LeaderBoard;
use Uxbert\Gamification\Models\LeaderBoardRecord;
use Uxbert\Gamification\Models\Client_User;

class ActionRegistered
{
    use Dispatchable, SerializesModels;

    public $action_record;

    public function __construct(ActionRecord $action_record)
    {

        $this->$action_record = $action_record;
        // $this->updatePoints($action_record);
    }


    public function updatePoints($action_record)
    {
        // loop all leaderboards of client  
         $leaderboards = LeaderBoard::where('client_id', $action_record->client_id)->get();
        // loop all leaderboards
        foreach ($leaderboards as $leaderboard) {
            $userRecord = LeaderBoardRecord::where(['leaderboard_id' => $leaderboard->id, 'client_id' => $action_record->client_id, 'user_id'=>  $action_record->user_id])->first();
            $user = Client_User::find($action_record->user_id);
            // check if he already joined leaderboard before we will update points 
            if ($userRecord) {
                $userRecord->points = $user->total_earned_points;
                $userRecord->save();
                // $this->updateRanks($leaderboard, $action_record);
            }
            // check if user not joind yet we will add him to with his points 
            else {
                if($user) {
                    LeaderBoardRecord::create([
                        'user_name' => $user->first_name . ' ' . $user->last_name, 
                        'points' => $user->total_earned_points, 
                        'rank' => 99999, 
                        'user_id' => $action_record->user_id,
                        'leaderboard_id' => $leaderboard->id,
                        'client_id' => $action_record->client_id
                    ]);
                    // $this->updateRanks($leaderboard, $action_record);
                }
            }
        }
    }


    public function updateRanks($leaderboard, $action_record)
    {
        $allRecords = LeaderBoardRecord::where(['leaderboard_id' => $leaderboard->id, 'client_id' => $action_record->client_id])->orderBy('points', 'desc', 'natural')->get();
        $rank = 1;
        // update ranks 
        foreach($allRecords as  $oneRecord){
            $oneRecord->rank = $rank;
            $oneRecord->save();
            $rank = $rank + 1;
        }
    }

}