<?php

use Illuminate\Database\Seeder;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NbrSpecialite=(int)$this->command->ask('How many of Speciality you want generate ? [default 30]',30);
        factory(App\Specialite::class,$NbrSpecialite)->create();
    }
}
