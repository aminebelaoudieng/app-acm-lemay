<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddfieldsPlexesFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fiches', function (Blueprint $table) {
            $table->integer('unites_commercial')->nullable()->default(null);
            $table->integer('unites_residentiel_studio')->nullable()->default(null);
            $table->integer('unites_residentiel_1')->nullable()->default(null);
            $table->integer('unites_residentiel_2')->nullable()->default(null);
            $table->integer('unites_residentiel_3')->nullable()->default(null);
            $table->integer('unites_residentiel_4')->nullable()->default(null);
            $table->integer('unites_residentiel_5')->nullable()->default(null);
            $table->integer('unites_residentiel_6')->nullable()->default(null);
            $table->integer('unites_residentiel_7')->nullable()->default(null);
            $table->integer('unites_residentiel_8')->nullable()->default(null);
            $table->integer('rendement_revenus_brut')->nullable()->default(null);
            $table->integer('rendement_depense')->nullable()->default(null);
        });
    }
}