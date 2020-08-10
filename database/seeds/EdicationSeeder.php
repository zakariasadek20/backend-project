<?php

use Illuminate\Database\Seeder;

class EdicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $NbrEdication = (int)$this->command->ask('How many of Edication you want generate ? [default 60]', 60);

        $docteurs = App\Docteur::all();
        if ($docteurs->count() == 0) {
            $this->command->info('please create some docteurs');
            return;
        }

        // $NbrEdication = $NbrEdication < $docteurs->count() ? $NbrEdication * $docteurs->count() : $NbrEdication;

        // factory(App\Edication::class, $NbrEdication)->make()->each(function ($edication) use ($docteurs) {
        //     $edication->docteur_id = $docteurs->random()->id;
        //     $edication->save();
        // });
        $docteurs->each(function($docteur){
            factory(App\Edication::class, 3)->make()->each(function ($edication) use ($docteur) {
                $edication->docteur_id = $docteur->id;
                $edication->save();
            });
        });
    }
}
