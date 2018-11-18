<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForecastsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasts_types', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->timestamps();
        });

        Schema::table('forecasts', function (Blueprint $table) {
            $table->integer('forecasts_type_id')->unsigned();
        });

        Schema::table('forecasts', function (Blueprint $table) {
            $table->foreign('forecasts_type_id')
                ->references('id')->on('forecasts_types')
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
        Schema::dropIfExists('forecasts_types');
    }
}
