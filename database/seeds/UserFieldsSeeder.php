<?php

use Illuminate\Database\Seeder;

class UserFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = ['date_of_birth', 'name', 'avatar'];

        foreach ( $fields as $field ){

            DB::table('user_fields')->insert([
                'field_path' => $field,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        }
    }
}
