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
        $this->call(UsersSeeder::class);
        $this->call(UserFieldsSeeder::class);
        $this->call(UserFieldValuesSeeder::class);
        $this->call(ZodiacsSeeder::class);
        $this->call(ForecastsTypesSeeder::class);
        $this->call(ForecastsSeeder::class);
    }
}
