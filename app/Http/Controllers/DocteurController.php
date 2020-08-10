<?php

namespace App\Http\Controllers;

use App\Docteur;
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
        return DocteurResource::collection(Docteur::with(
            ['specialites', 'ville', 'position', 'cabinet']
        )->paginate($perPage)->appends([
            'per_page' => $perPage
        ]));

        // return $this->distance( 33.266158, -7.581950, 33.277113, -7.579224);


    }
    public function SearchByDistance(SearchDocteurDistanceRequest $request)
    {
        $lat = (float)$request->input('latitude');
        $long = (float)$request->input('longitude');
        $zone = (float)$request->input('zone');
        $perPage = (float) $request->input('per_page') ?? 5.0;

        $doctors = DocteurResource::collection(Docteur::with(
            ['specialites', 'ville', 'position', 'cabinet']
        )
            ->paginate($perPage)->appends([
                'per_page' => $perPage
            ]));
        // $doctors->
        foreach ($doctors as $doctor) {

            if ($this->calcDistance($lat, $long, (float)$doctor->position->latitude, (float)$doctor->position->longitude) > $zone) {
                // $doctors->forget($doctors,$doctor);
            }
        }

        return $doctors;

        // return DocteurResource::collection(Docteur::with(
        //     ['specialites', 'ville', 'position', 'cabinets']
        // )->where()->get());
    }
    private function calcDistance($lat1, $long1, $lat2, $long2)
    {
        $degrees =

            (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) +
            (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
                cos(deg2rad($long1 - $long2)));

        $degrees = acos($degrees);
        $degrees = rad2deg($degrees);
        $distance = $degrees * 111.13384;
        return  round($distance, 2);
    }

    public function SearchByVille(SearchByVilleRequest $request)
    {
        $ville_name = $request->input('ville_name');
        // $ville=Ville::with(['docteurs','docteurs.specialites','docteurs.position',
        //                     'docteurs.cabinet','docteurs.ville','docteurs.services'])
        //         ->where('nom','like','%'.$ville_name.'%')->first();
        // $docteurs=$ville->docteurs;
        // return $docteurs;
        // return DocteurResource::collection($docteurs);
        return DocteurResource::collection(Docteur::with(
            ['specialites', 'ville', 'position', 'cabinet','services']
        )->whereHas('ville', function ($query) use ($ville_name) {
            $query->where('nom', 'like', '%' . $ville_name . '%');
        })->get());
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
