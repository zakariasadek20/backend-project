<?php

use App\Docteur;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NbrMembership=(int)$this->command->ask('How many of Membership you want generate ? [default 30]',30);

        $docteurs=Docteur::all();
        if($docteurs->count()==0){
            $this->command->info('please create some docteurs');
            return;
        }
        // $NbrMembership=$NbrMembership<$docteurs->count() ? $NbrMembership*$docteurs->count() : $NbrMembership;


        factory(App\Membership::class,$NbrMembership)->make()->each(function($membership) use ($docteurs){
            $membership->docteur_id=$docteurs->random()->id;
            $membership->save();
        });
    }
}
