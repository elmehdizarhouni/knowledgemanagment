<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_evaluateur')->nullable();
            $table->string('prenom_evaluateur')->nullable();
            $table->string('adresse_evaluateur');
            $table->string('email_evaluateur')->unique()->nullable();
            $table->string('tel_evaluateur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluateurs');
    }
};
