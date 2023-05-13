<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Communes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('province_id');
            $table->string('libelle')->nullable()->default(null);
            $table->string('commentaire')->nullable()->default(null);
            $table->boolean('deleted')->default(false);

            $table->foreign('province_id', 'FK_Province')
                    ->references('id')->on('provinces')
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
        Schema::dropIfExists('communes');
    }
}
