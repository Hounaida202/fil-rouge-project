<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('ville_depart');
            $table->string('ville_arrivee');
            $table->string('date_depart')->nullable();
            $table->string('type');
            $table->string('poids')->nullable();
            $table->string('description');
            $table->string('image')->nullable();
            $table->string('prix')->nullable();
            $table->enum('etat',['en cours','expiré'])->nullable()->default('en cours');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('publications');
    }
};
