<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateShareDetailsJob;
use App\Models\Share;
use Illuminate\Http\Request;

class ShareController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('shares.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $symbol = $request->get('symbol');
        ini_set('max_execution_time',0);
        $json = file_get_contents('https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=' . $symbol . '&apikey=' . env('ALPHA_VANTAGE_API_KEY'));
        $data = json_decode($json, true);

        if (count($data['bestMatches']) != 1) {
            return $this->sendError('We could not find any shares with the symbol provided. Please try again.');
        }
        $result = $data['bestMatches'][0];
        $name = $result['2. name'];
        UpdateShareDetailsJob::dispatch($symbol,$name);

        return $this->sendSuccess('Share added Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Share $share
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        return view('shares.share_details',compact('share'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Share $share
     * @return \Illuminate\Http\Response
     */
    public function edit(Share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Share $share
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Share $share)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Share $share
     * @return \Illuminate\Http\Response
     */
    public function destroy(Share $share)
    {
        //
    }
}
