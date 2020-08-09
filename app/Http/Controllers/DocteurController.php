<?php

namespace App\Http\Controllers;

use App\Docteur;
use App\Http\Resources\DocteurResource;
use Illuminate\Http\Request;

class DocteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DocteurResource::collection(Docteur::with(['ville'])->get());
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
     * @param  \App\docteur  $docteur
     * @return \Illuminate\Http\Response
     */
    public function show(docteur $docteur)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\docteur  $docteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, docteur $docteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\docteur  $docteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(docteur $docteur)
    {
        //
    }
}
