<?php

use Illuminate\Database\Seeder;

class CabinetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $NbrCabinet=(int)$this->command->ask('How many of Cabinet you want generate ? [default 30]',30);

        $docteurs = App\Docteur::all();

        if ($docteurs->count() == 0) {
            $this->command->info('please create some docteurs');
            return;
        }

        // $index=0;
        // factory(App\Cabinet::class, $docteurs->count())->make()->each(function ($cabinet) use ($docteurs,$index) {
        //     $cabinet->docteur_id = $docteurs->random()->id;
        //     $cabinet->save();
        // });
        $docteurs->each(function($docteur){
            factory(App\Cabinet::class, 1)->make()->each(function ($cabinet) use ($docteur) {
                    $cabinet->docteur_id = $docteur->id;
                    $cabinet->save();
            });
        });
    }
}
