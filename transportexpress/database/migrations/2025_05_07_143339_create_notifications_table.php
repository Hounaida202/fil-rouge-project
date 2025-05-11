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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auteur_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('cible_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('publication_id')->nullable()->constrained('publications')->onDelete('cascade');
        $table->foreignId('reservation_id')->nullable()->constrained('reservations')->onDelete('cascade');
        $table->string('type')->nullable();

        $table->boolean('is_read')->default(false);
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
        Schema::dropIfExists('notifications');
    }
};
