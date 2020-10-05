<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class JourDeTravail extends Model
{

    //
    protected $fillable = [
        'heure_deb', 'heure_fin', 'jour_index', 'docteur_id'
    ];
    public function docteur()
    {
        return $this->belongsTo(Docteur::class);
    }

    public  static function handleDate($jourIndex)
    {
        $currentDate = Carbon::createFromFormat('Y m d H:i:s',Carbon::now()->format('Y m d H:i:s'));
        // $currentDate = Carbon::now();

        // Get index day of the week.
        $currentDayIndex = $currentDate->dayOfWeek;

        if ($jourIndex <= $currentDayIndex) {
            // get difference of days between current day and selected day
            $diffDays = $currentDayIndex - $jourIndex;
            $currentDate->subDays($diffDays);
            return $currentDate->format('Y m d H:i:s');
        } else {
            $diffDays = $jourIndex - $currentDayIndex;
            $currentDate->addDays($diffDays);
            return $currentDate->format('Y m d H:i:s');
        }
    }
}
