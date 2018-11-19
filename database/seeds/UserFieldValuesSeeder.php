<?php

use Illuminate\Database\Seeder;

class UserFieldValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $i = 1; $i <= 200; $i++ ) {

            DB::table('user_field_values')->insert([
                'value' => '1920-12-23',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'user_id' => $i,
                'user_field_id' => 1
            ]);
        }

        for( $i = 201; $i <= 250; $i++ ) {

            DB::table('user_field_values')->insert([
                'value' => '1920-11-23',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'user_id' => $i,
                'user_field_id' => 1
            ]);
        }

        for( $i = 251; $i <= 300; $i++ ) {

            DB::table('user_field_values')->insert([
                'value' => '1921-01-17',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'user_id' => $i,
                'user_field_id' => 1
            ]);
        }

    }
}
