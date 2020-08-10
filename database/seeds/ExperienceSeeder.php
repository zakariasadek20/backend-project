<?php

use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  $NbrExperience=(int)$this->command->ask('How many of Experience you want generate ? [default 60]',60);

        $docteurs=App\Docteur::all();
        if($docteurs->count()==0){
            $this->command->info('please create some docteurs');
            return;
        }
        // $NbrExperience=$NbrExperience<$docteurs->count() ? $NbrExperience*$docteurs->count()  : $NbrExperience;

        // factory(App\Experience::class,$NbrExperience)->make()->each(function($experience) use ($docteurs){
        //     $experience->docteur_id=$docteurs->random()->id;
        //     $experience->save();
        // });
        $docteurs->each(function($docteur){
            factory(App\Experience::class,3)->make()->each(function($experience) use ($docteur){
                $experience->docteur_id=$docteur->id;
                $experience->save();
            });
        });
    }
}
