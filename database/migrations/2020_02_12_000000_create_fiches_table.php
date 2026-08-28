<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->longText('intro')->nullable();
            $table->string('but')->nullable();
            $table->date('date')->nullable();
            $table->integer('periode')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('annee_role')->nullable();
            $table->bigInteger('evaluation_terrain')->nullable();
            $table->bigInteger('evaluation_batiment')->nullable();
            $table->string('caracteristique_type_propriete')->nullable();
            $table->string('caracteristique_type_batiment')->nullable();
            $table->integer('caracteristique_annee_construction')->nullable();
            $table->integer('caracteristique_superficie_terrain')->nullable();
            $table->integer('caracteristique_superficie_habitable')->nullable();
            $table->integer('caracteristique_garage')->nullable();
            $table->integer('caracteristique_stationnement')->nullable();
            $table->string('caracteristique_nombre_piece')->nullable();
            $table->integer('caracteristique_nombre_chambre')->nullable();
            $table->integer('caracteristique_nombre_salle_de_bain')->nullable();
            $table->integer('caracteristique_etage')->nullable();

            $table->bigInteger('comparable_vendu_prix_demande')->nullable();
            $table->bigInteger('comparable_vendu_prix_evaluation')->nullable();
            $table->bigInteger('comparable_vendu_prix_vente')->nullable();
            $table->date('comparable_vendu_date_vente')->nullable();
            $table->integer('comparable_vendu_delais_vente')->nullable();

            $table->bigInteger('comparable_vigueur_prix_demande')->nullable();
            $table->bigInteger('comparable_vigueur_prix_evaluation')->nullable();
            $table->date('comparable_vigueur_date_vente')->nullable();


            $table->bigInteger('prix_offensif')->nullable();
            $table->bigInteger('prix_realiste')->nullable();
            $table->bigInteger('prix_optimiste')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiches');
    }
}
