<?php

use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $NbrAward =(int) $this->command->ask('How many of Award you want generate ? [default 30]', 30);

        $docteurs = App\Docteur::all();
        if ($docteurs->count() == 0) {
            $this->command->info('please create some docteurs');
            return;
        }

        factory(App\Award::class, $NbrAward)->make()->each(function ($award) use ($docteurs) {
            $award->docteur_id = $docteurs->random()->id;
            $award->save();
        });
    }
}
