<?php

use App\Docteur;
use App\Langue;
use Illuminate\Database\Seeder;

class DocteurLangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langues_count = App\Langue::count();

        if ($langues_count == 0) {
            $this->command->info('please create some langues');
            return;
        }


        Docteur::all()->each(function ($docteur) use ($langues_count) {
            $take = random_int(0, $langues_count);
            $languesId = Langue::inRandomOrder()->take($take)->pluck('id');
            $docteur->langues()->sync($languesId);
        });
    }
}
