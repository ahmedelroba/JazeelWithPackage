<?php

namespace Uxbert\Gamification\Listeners;

use Uxbert\Gamification\Events\ActionRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Uxbert\Gamification\Models\LeaderBoard;
use Uxbert\Gamification\Models\LeaderBoardRecord;
use Illuminate\Support\Facades\Log;
  use Illuminate\Support\Facades\Redis;
  use Illuminate\Queue\InteractsWithQueue;
class UpdateActionPoints implements ShouldQueue
{
    use InteractsWithQueue;
    public function __construct()
    {
        //
    }

    public function handle(ActionRegistered $event)
    {
        // Code here to update action points in user records
        $action_record = $event->action_record;
        Log::info('Showing Update Action Points ');

        $this->updatePoints($action_record);

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
                }
            }
        }
    }

}