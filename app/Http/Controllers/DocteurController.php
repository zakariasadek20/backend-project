<?php

namespace App\Http\Controllers;

use App\Docteur;
use App\Http\Requests\SearchBySpecialiteRequest;
use App\Http\Requests\SearchByVilleRequest;
use App\Http\Requests\SearchDocteurDistanceRequest;
use App\Http\Resources\DocteurResource;
use App\Ville;
use Illuminate\Http\Request;

class DocteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page') ?? 5;
        return DocteurResource::collection(Docteur::paginate($perPage)->appends([
            'per_page' => $perPage
        ]));
    }

    public function SearchByDistance(SearchDocteurDistanceRequest $request)
    {
        $lat = (float)$request->input('latitude');
        $long = (float)$request->input('longitude');
        $zone = (float)$request->input('zone');
        // $perPage = (float) $request->input('per_page') ?? 5.0;

        $doctors = DocteurResource::collection(Docteur::all());

        $doctors = $doctors->filter(function ($doctor) use ($lat, $long, $zone) {
            return $doctor->calcDistance($lat, $long) < $zone;
        })->values()->all();;

        return response()->json([
            'data'=>$doctors
        ]);
    }

    public function SearchByVille(SearchByVilleRequest $request)
    {
        $ville_name = $request->input('ville_name');

        return DocteurResource::collection(Docteur::getByVille($ville_name)->get());
    }

    public function SearchBySpecialite(SearchBySpecialiteRequest $request){
        $specialite_id=$request->input('specialite_id');
        return DocteurResource::collection(Docteur::getBySpecialite($specialite_id)->get());
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
    public function show(Docteur $docteur)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\docteur  $docteur
     * @return \Illuminate\Http\Response
     */
    public function showByDistance(Docteur $docteur)
    {
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\docteur  $docteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docteur $docteur)
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
