<?php

use Illuminate\Database\Seeder;

class ForecastsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forecasts_types = ['Гороскоп на следующий месяц', 'Гороскоп на текущую неделю', 'Гороскоп на вчерашний день'];

        foreach ($forecasts_types as $type){

            DB::table('forecasts_types')->insert([
                'name' => $type,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
