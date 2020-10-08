<?php

namespace App\Http\Controllers;

use App\Docteur;
use App\Http\Requests\storeRDVGuestPatientRequest;
use App\Http\Resources\RendezVousResources;
use App\Patient;
use App\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;
use SebastianBergmann\CodeCoverage\Report\Html\Renderer;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($docteur)
    {
        $appointments=RendezVous::with('patient')->where('docteur_id',$docteur)->latest('datetime')->get();
        $appointments->each(function($appointment){
            $appointment->patient->loadCount('rendez_vouses');
            $appointment->patient->type=$appointment->patient->rendez_vouses_count>1? 'Ancien patient':'Nouveau patient' ;
        });
        // return RendezVousResources::collection($appointments);
        return $appointments;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRDVGuestPatient(storeRDVGuestPatientRequest $request)
    {
        $patient = Patient::whereEmail($request->input('email'))->first();

        if (!$patient) {
            $patient = Patient::create([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'email' => $request->input('email'),
                'telephone' => $request->input('telephone')
            ]);
        }

        $rendezVous = RendezVous::where([
            ['patient_id','=',$patient->id],
            ['etat','=', 'enAttent']
        ])->first();

        if(!$rendezVous){

            $rendezVous = RendezVous::create([
                'datetime' => $request->input('datetime'),
                'etat' => 'enAttent',
                'docteur_id' => $request->input('docteur_id'),
                'patient_id' => $patient->id
            ]);
        }
        return $rendezVous;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function show(RendezVous $rendezVous)
    {
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function checkRDV(Request $request)
    {
        $rdv=RendezVous::withCount('patient')->where("Datetime",$request->datetime)->get()->count();
        return $rdv;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function edit(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RendezVous $rendezVous)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function destroy(RendezVous $rendezVous)
    {
        //
    }
}
