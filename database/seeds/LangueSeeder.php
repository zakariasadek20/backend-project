<?php

use Illuminate\Database\Seeder;

class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NbrLangue=(int)$this->command->ask('How many of Langue you want generate ? [default 6]',6);

        $docteurs=App\Docteur::all();
        if($docteurs->count()==0){
            $this->commande->info('please create some docteurs');
            return;
        }

        // $NbrLangue=$NbrLangue<$docteurs->count() ? $NbrLangue*$docteurs->count() : $NbrLangue;

        factory(App\Langue::class,$NbrLangue)->create();
    }
}
