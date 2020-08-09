<?php

use App\Docteur;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $NbrPosition=(int)$this->command->ask('How many of Position you want generate ? [default 30]',30);

        $docteurs=Docteur::all();
        if($docteurs->count()==0){
            $this->command->info('please create some docteurs');
            return;
        }

        factory(App\Position::class,$docteurs->count())->make()->each(function($position) use ($docteurs){
            $position->docteur_id=$docteurs->random()->id;
            $position->save();
        });
    }
}
