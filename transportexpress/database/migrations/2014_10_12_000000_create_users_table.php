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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tel')->nullable();
            $table->string('ville')->nullable();
            $table->string('image')->nullable();
            $table->string('cin')->nullable();
            $table->enum('role', ['Transporteur', 'Client','admin']);
            $table->enum('status', ['en attente', 'valide','invalide'])->default('en attente');
            $table->enum('compte', ['Actif', 'Suspendu'])->default('Actif');
            $table->string('preuve')->nullable();
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
};
