<?php

namespace Uxbert\Gamification\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uxbert\Gamification\Helpers\Helper;
use Uxbert\Gamification\Http\Requests\Action\CreateActionRequest;
use Uxbert\Gamification\Http\Resources\Action\ActionResource;
use Uxbert\Gamification\Http\Resources\Jazeel\StatusCollection;
use Uxbert\Gamification\Models\Action;
use Uxbert\Gamification\Models\Client;

class ActionController extends Controller
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
             $actions = Action::where('client_id', $checking->id)->orderBy('created_at', 'desc')->get();
            return ActionResource::collection($actions);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateActionRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $random_key = Helper::unique_random('actions', 'key');
            Action::create([
                'name'              => utf8_encode($request->name),
                'description'       => $request->description,
                'key'               => $random_key,
                'points'            => $request->points,
                'type'              => 'plus',
                'status'            => $request->status,
                'client_id'         => $checking->id,
                'action_frequency'  => $request->action_frequency_val,
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
            ]);
            return (new StatusCollection(true, 'You are added new action successfully.'))->response()->setStatusCode(200);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->action_key)) {
            $action = Action::where('client_id', $checking->id)->where('key', $request->action_key)->first();
            if($action)
                return new ActionResource($action);
            else
                return (new StatusCollection(false, 'Please enter correct action_key.'))->response()->setStatusCode(401);
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
            $actions = Action::where('client_id', $checking->id)->Where('name', 'LIKE', '%' . $request->name . '%')->get();
            return ActionResource::collection($actions);
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
        if (!empty($checking) && !empty($request->action_key)) {
            $action = Action::where('client_id', $checking->id)->where('key', $request->action_key)->first();
            if($action)
                return new ActionResource($action);
            else
                return (new StatusCollection(false, 'Please enter correct action_key.'))->response()->setStatusCode(401);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->action_key)) {
            $action = Action::where('client_id', $checking->id)->where('key', $request->action_key)->first();
            $action->name = utf8_encode($request->name);
            $action->description = utf8_encode($request->description);
            $action->points = utf8_encode($request->points);
            $action->action_frequency = $request->action_frequency_val ?? $action->action_frequency;
            $action->start_date = $request->start_date ?? $action->start_date;
            $action->end_date = $request->end_date ?? $action->end_date;
            $action->status = ((boolean) $request->status);
            $action->save();
            return new ActionResource($action);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->action_key)) {
            $action = Action::where('client_id', $checking->id)->where('key', $request->action_key)->first();
            $action->delete();
            return (new StatusCollection(true, 'You are deleted action successfully.'))->response()->setStatusCode(200);
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
