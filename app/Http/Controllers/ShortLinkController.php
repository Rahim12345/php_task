<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Http\Requests\StoreShortLinkRequest;
use App\Http\Requests\UpdateShortLinkRequest;
use Carbon\Carbon;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();

        return view('shortenLink', compact('shortLinks'));
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
     * @param  \App\Http\Requests\StoreShortLinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShortLinkRequest $request)
    {
        ShortLink::create([
           'link'=>$request->link ,
            'code'=>str_random(6),
            'days'=>$request->day
        ]);

        return redirect()
            ->route('index')
            ->with('success', 'Shorten Link Generated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $shortLink = ShortLink::whereCode($code)->firstOrFail();

        $date   = Carbon::parse($shortLink->created_at);
        $now    = Carbon::now();
        $diff = $date->diffInDays($now);
        if ($diff > $shortLink->days)
        {
            return redirect()
                ->route('index')
                ->with('expired', 'Shorten Link expired!');
        }
        $shortLink->increment('hits');
        return view('redirect',[
            'link'=>$shortLink->link
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortLink $shortLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShortLinkRequest  $request
     * @param  \App\Models\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShortLinkRequest $request, ShortLink $shortLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortLink $shortLink)
    {
        //
    }
}
