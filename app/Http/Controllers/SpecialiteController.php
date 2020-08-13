<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpesialitesResource;
use App\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SpesialitesResource::collection(
            Specialite::has('docteurs','>','0')
                        ->withCount('docteurs')
                        ->orderBy('docteurs_count','desc')
                        ->get()
        );
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function show(specialite $specialite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function edit(specialite $specialite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, specialite $specialite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialite $specialite)
    {
        //
    }
}
