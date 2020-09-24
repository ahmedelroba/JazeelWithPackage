<?php

namespace Uxbert\Gamification\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uxbert\Gamification\Http\Requests\API\Sponsor\CreateSponsorRequest;
use Uxbert\Gamification\Http\Requests\API\Sponsor\UpdateSponsorRequest;
use Uxbert\Gamification\Http\Resources\Jazeel\StatusCollection;
use Uxbert\Gamification\Http\Resources\Sponsor\SponsorResource;
use Uxbert\Gamification\Models\Sponsor;
use Uxbert\Gamification\Helpers\Helper;
use Uxbert\Gamification\Models\Client;

class SponsersController extends Controller
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
            $sponsors = Sponsor::where('client_id', $checking->id)->get();
            return SponsorResource::collection($sponsors);
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
            $sponsors = Sponsor::where('client_id', $checking->id)->Where('name', 'LIKE', '%' . $request->name . '%')->get();
            return SponsorResource::collection($sponsors);
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
        if (!empty($checking) && !empty($request->sponsor_key)) {
            $sponsors = Sponsor::where('client_id', $checking->id)->where('key', $request->sponsor_key)->first();
            return new SponsorResource($sponsors);
        }
        return (new StatusCollection(false, 'Please enter correct cliend_id and client_secret.'))->response()->setStatusCode(401);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSponsorRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking)) {
            $fileInputName = 'logo';
            $fileMedia = null;
            if ($request->hasFile($fileInputName))
                $fileMedia = (string) Helper::UpdateFile($request, 'uploads/sponsors/' . Helper::GenerateRandomString() . '/' . Helper::GenerateRandomString() . '/', $fileInputName);

            $random_key = Helper::unique_random('sponsors', 'key');
            $sponsors = Sponsor::create([
                'name'          => utf8_encode($request->name),
                'description'   => utf8_encode($request->description),
                'logo'          => $fileMedia,
                'status'        => $request->status,
                'key'           => $random_key,
                'client_id'     => $checking->id
            ]);
            return new SponsorResource($sponsors);
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
    public function update(UpdateSponsorRequest $request)
    {
        $checking = $this->checkingClientIdAndSecret($request);
        if (!empty($checking) && !empty($request->sponsor_key)) {
            $sponsor = Sponsor::where('client_id', $checking->id)->where('key', $request->sponsor_key)->first();
            $fileInputName = 'logo';
            $fileMedia = null;
            if ($request->hasFile($fileInputName))
                $fileMedia = (string) Helper::UpdateFile($request, 'uploads/sponsors/' . Helper::GenerateRandomString() . '/' . Helper::GenerateRandomString() . '/', $fileInputName, $sponsor->logo);

            $sponsor->name = utf8_encode($request->name);
            $sponsor->description = utf8_encode($request->description);
            $sponsor->logo = $fileMedia ?? $sponsor->logo;
            $sponsor->status = $request->status;
            $sponsor->save();
            return new SponsorResource($sponsor);
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
        if (!empty($checking) && !empty($request->sponsor_key)) {
            $sponsor = Sponsor::where('client_id', $checking->id)->where('key', $request->sponsor_key)->first();
            $sponsor->delete();
            return (new StatusCollection(true, 'You are deleted Sponsor successfully.'))->response()->setStatusCode(200);
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
