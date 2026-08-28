<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddfieldsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('poste');
            /*    $table->string('couleur'); */
            $table->string('adresse');
            $table->string('compagnie');
            $table->string('telephone');
            $table->string('slogan');
            $table->string('siteweb');
            /*    $table->string('logo')->default('logo.jpg'); */
            $table->string('photo')->default('user.jpg');
        });
    }
}
