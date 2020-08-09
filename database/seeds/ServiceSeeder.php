<?php

use App\Docteur;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NbrService=(int)$this->command->ask('How many of Service you want generate ? [default 30]',30);

        $docteurs=Docteur::all();
        if($docteurs->count()==0){
            $this->coomand->info('please create some docteurs');
            return;
        }
        // $NbrService=$NbrService<$docteurs->count() ? $NbrService*$docteurs->count() : $NbrService;

        factory(App\Service::class,$NbrService)->make()->each(function($service) use ($docteurs){
            $service->docteur_id=$docteurs->random()->id;
            $service->save();
        });
    }
}
