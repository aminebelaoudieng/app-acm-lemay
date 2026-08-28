<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddfieldsFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fiches', function (Blueprint $table) {

            $table->string('map_lat')->nullable();
            $table->string('map_lng')->nullable();
            $table->string('map_zoom')->nullable();
            $table->string('street_heading')->nullable();
            $table->string('street_pitch')->nullable();
            $table->string('street_zoom')->nullable();
            $table->string('street_lat')->nullable();
            $table->string('street_lng')->nullable();
        });
    }
}
