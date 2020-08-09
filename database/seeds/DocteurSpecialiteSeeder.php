<?php

use App\Docteur;
use App\Specialite;
use Illuminate\Database\Seeder;

class DocteurSpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialites = Specialite::all();

        if ($specialites->count() == 0) {
            $this->command->info('please create some Specialite');
            return;
        }

        Docteur::all()->each(function ($docteur) use ($specialites) {
            $take = random_int(0, $specialites->count());
            $specialitesId = Specialite::inRandomOrder()->take($take)->pluck('id');
            $docteur->specialites()->sync($specialitesId);
        });
    }
}
