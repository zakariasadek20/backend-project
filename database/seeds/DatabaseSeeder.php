<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        if($this->command->confirm('Do you want to refresh the database ?')){
            $this->command->call('migrate:refresh');
            $this->command->info('Database was refresh');
        }
        $this->call([
            VilleSeeder::class,
            SpecialiteSeeder::class,
            DocteurSeeder::class,
            DocteurSpecialiteSeeder::class,
            JourDeTravailSeeder::class,
            CabinetSeeder::class,
            EdicationSeeder::class,
            ExperienceSeeder::class,
            AwardSeeder::class,
            MembershipSeeder::class,
            PositionSeeder::class,
            ServiceSeeder::class,
            LangueSeeder::class,
            DocteurLangueSeeder::class
        ]);
    }
}
