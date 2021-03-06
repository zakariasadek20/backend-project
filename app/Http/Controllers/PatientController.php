<?php

namespace App\Http\Controllers;

use App\Docteur;
use App\Http\Requests\AddGestPatientRequest;
use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Docteur $docteur)
    {
        
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

    public function storeGuestPatient(AddGestPatientRequest $request)
    {
        $patient=Patient::whereEmail($request->input('email'))->first();
        if(!$patient){
            $patient=Patient::create([
                'nom'=>$request->input('nom'),
                'prenom'=>$request->input('prenom'),
                'email'=>$request->input('email'),
                'telephone'=>$request->input('telephone')
            ]);
        }
        return $patient;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
