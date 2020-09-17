<?php

namespace Uxbert\Gamification\Http\Resources\Jazeel;

use Illuminate\Http\Resources\Json\Resource;

class StatusCollection extends Resource
{
    private  $message , $status,$key=null;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __construct($status,$message,$key=null)
    {
        $this->status = $status;
        $this->message = $message;
        $this->key = $key;
    }
    public function toArray($request)
    {
        $returnedArray = [
            'status'  => $this->status,
            'message' => $this->message,
        ];
        if (!empty($this->key))
            $returnedArray['key'] = $this->key;
        return $returnedArray;
    }
}
