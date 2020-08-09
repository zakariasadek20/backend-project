<?php

use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $NbrVille=(int)$this->command->ask('How many of ville  you want generate ? [default 30]',30);
        factory(App\Ville::class,$NbrVille)->create();

    }
}
