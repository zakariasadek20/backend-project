<?php

namespace App\Http\Controllers;

use App\Docteur;
use App\Http\Resources\JourDeTravailResource;
use App\JourDeTravail;
use App\RendezVous;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JourDeTravailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index(Docteur $docteur)
    {
        $jourDeTravail=JourDeTravailResource::collection($docteur->jourDeTravails);
        $timing=collect();
        $today= Carbon::createFromFormat('Y m d H:i:s',Carbon::now()->format('Y m d H:i:s'))->addHour();

        $jourDeTravail->each(function($jour) use($timing,$today){

            $currentDateString = Carbon::createFromFormat('Y m d H:i:s',$jour->handleDate($jour->jour_index));

            $heureDeb =Carbon::createFromFormat('Y m d H:i:s',$currentDateString->setTimeFromTimeString($jour->heure_deb)->format('Y m d H:i:s'));
            $heurfin  =Carbon::createFromFormat('Y m d H:i:s',$currentDateString->setTimeFromTimeString($jour->heure_fin)->format('Y m d H:i:s'));
            
            $currentH = Carbon::createFromFormat('Y m d H:i:s',$heureDeb->format('Y m d H:i:s'));
            $heures = collect();

            while ($currentH<=$heurfin) {
                // check if this Hour is valid (not expired)
                $expired = $currentH<=$today || RendezVous::whereDatetime($currentH->format('Y-m-d H:i:s'))->whereEtat('enAttent')->count()>=3? true : false;

                $heures->push(['heure'=> $currentH->format('H:i'),
                    'selected'=> false,
                    'expired'=> $expired
                ]);
                $currentH->addMinutes(30);
            }
            $timing->push([
                'date'=> Carbon::createFromFormat('Y m d H:i:s',$jour->handleDate($jour->jour_index))->format('Y m d'),
                'jour_index'=> $jour->jour_index,
                'hours'=>$heures
            ]);
        });
        $jourDeTravail=null;
        return $timing;
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
     * @param  \App\JourDeTravail  $jourDeTravail
     * @return \Illuminate\Http\Response
     */
    public function show(JourDeTravail $jourDeTravail)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JourDeTravail  $jourDeTravail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JourDeTravail $jourDeTravail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JourDeTravail  $jourDeTravail
     * @return \Illuminate\Http\Response
     */
    public function destroy(JourDeTravail $jourDeTravail)
    {
        //
    }
}
