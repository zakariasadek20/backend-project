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

        factory(App\Cabinet::class, $docteurs->count())->make()->each(function ($cabinet) use ($docteurs) {
            $cabinet->docteur_id = $docteurs->random()->id;
            $cabinet->save();
        });
    }
}
