<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Periodoclase;
use Illuminate\Http\Request;
use App\Http\Resources\PeriodoclaseResource;
use Illuminate\Support\Facades\Auth;

class PeriodoclaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PeriodoclaseResource::collection(Periodoclase::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodosclase = Periodoclase::create(json_decode($request->getContent(), true));
        return new PeriodoclaseResource($periodosclase);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periodoclase  $periodoclase
     * @return \Illuminate\Http\Response
     */
    public function show(Periodoclase $periodosclase)
    {
        return new PeriodoclaseResource($periodosclase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periodoclase  $periodoclase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periodoclase $periodosclase)
    {
        $periodosclase->update(json_decode($request->getContent(), true));
        return new PeriodoclaseResource($periodosclase);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periodoclase  $periodoclase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodoclase $periodosclase)
    {
        $periodosclase->delete();
    }

    public function meToca() {

        return Auth::user()->meToca();

    }
}
