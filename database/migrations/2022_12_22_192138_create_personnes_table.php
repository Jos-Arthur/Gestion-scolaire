<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profil_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('localite_id');
            $table->string('nom')->nullable()->default(null);
            $table->string('prenom')->nullable()->default(null);
            $table->string('matricule')->nullable()->default(null);
            $table->string('telephone')->nullable()->default(null);
            $table->string('nip')->nullable()->default(null);
            $table->boolean('deleted')->default(0);

            $table->foreign('profil_id', 'FK_appartient')
                ->references('id')->on('profils')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('service_id', 'FK_possede')
                ->references('id')->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade');

             $table->foreign('localite_id', 'FK_associe')
                ->references('id')->on('localites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('personnes');
    }
}
