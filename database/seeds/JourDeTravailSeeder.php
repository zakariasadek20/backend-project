<?php

use Illuminate\Database\Seeder;

class JourDeTravailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $NbrJourDeTravail =(int) $this->command->ask('How many of Jour De Travail you want generate ? [default 500]', 500);

        $docteurs = App\Docteur::all();
        if ($docteurs->count() == 0) {
            $this->command->info('please create some docteurs');
            return;
        }
        // $NbrJourDeTravail = $NbrJourDeTravail < $docteurs->count() ? $NbrJourDeTravail * $docteurs->count() : $NbrJourDeTravail;

        // factory(App\JourDeTravail::class, $NbrJourDeTravail)->make()->each(function ($jourDeTravail) use ($docteurs) {
        //     $jourDeTravail->docteur_id = $docteurs->random()->id;
        //     $jourDeTravail->save();
        // });
        $docteurs->each(function($docteur){
            factory(App\JourDeTravail::class, 7)->make()->each(function ($jourDeTravail) use ($docteur) {
                $jourDeTravail->docteur_id = $docteur->id;
                $jourDeTravail->save();
            });
        });
    }
}
