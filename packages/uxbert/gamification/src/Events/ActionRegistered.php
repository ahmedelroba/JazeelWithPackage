<?php

namespace Uxbert\Gamification\Events;

use Uxbert\Gamification\Models\ActionRecord;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\Log;


class ActionRegistered
{
    use Dispatchable, SerializesModels;

    public $action_record;

    public function __construct(ActionRecord $action_record)
    {
        Log::info('Showing Event: ');

        $this->$action_record = $action_record;
    }

}