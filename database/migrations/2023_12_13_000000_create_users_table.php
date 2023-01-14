<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profil_id')->nullable()->default(null);
            $table->unsignedBigInteger('service_id')->nullable()->default(null);
            $table->unsignedBigInteger('localite_id')->nullable()->default(null);              
            $table->string('nom')->nullable()->default(null);
            $table->string('prenom')->nullable()->default(null);
            $table->string('username')->nullable()->default(null);
            $table->string('matricule')->nullable()->default(null);
            $table->string('telephone')->nullable()->default(null);
            $table->string('nip')->nullable()->default(null);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');          
            $table->boolean('deleted')->default(false);

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
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
