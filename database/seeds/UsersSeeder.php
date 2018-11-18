<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ( $i = 1; $i <= 300; $i++ ) {

            DB::table('users')->insert([
                'name' => 'alexey' . $i,
                'email' => 'alexey' . $i . '@yandex.ru',
                'password' => bcrypt('4$kqp25R'),
                'remember_token' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

        }
    }
}
