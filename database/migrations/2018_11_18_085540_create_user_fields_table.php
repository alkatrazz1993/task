<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field_path');
            $table->timestamps();
        });

        Schema::table('user_field_values', function (Blueprint $table) {
            $table->integer('user_field_id')->unsigned()->nullable();
        });

        Schema::table('user_field_values', function (Blueprint $table) {
            $table->foreign('user_field_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_fields');
    }
}
