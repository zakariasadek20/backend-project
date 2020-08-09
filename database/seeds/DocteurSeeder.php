<?php

use App\Ville;
use Illuminate\Database\Seeder;

class DocteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NbrDocteur =(int) $this->command->ask('How many of doctor you want generate ? [default 30]', 30);

        $villes = Ville::all();
        if ($villes->count() == 0) {
            $this->command->info('please create some villes');
            return;
        }



        factory(App\Docteur::class, $NbrDocteur)->make()->each(function ($docteur) use ($villes) {
            $docteur->ville_id = $villes->random()->id;
            $docteur->save();
        });
    }
}
