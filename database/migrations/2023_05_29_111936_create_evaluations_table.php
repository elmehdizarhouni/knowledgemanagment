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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_employe')->unsigned();
            $table->unsignedBigInteger('id_poste')->unsigned();
            $table->unsignedBigInteger('id_competence')->unsigned();
            $table->date('date_evaluation');
            $table->integer('note');
            $table->string('commentaire');
            $table->unsignedBigInteger('id_evaluateur')->unsigned();
            $table->foreign('id_evaluateur')->references('id')->on('evaluateurs');
            $table->foreign('id_employe')->references('id')->on('employes');
            $table->foreign('id_poste')->references('id')->on('postes');
            $table->foreign('id_competence')->references('id')->on('competences');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { Schema::table("evaluations",function(Blueprint $table){
        $table->dropForeign("id_evaluateur");
    });
    Schema::table("evaluations",function(Blueprint $table){
        $table->dropForeign("id_employe");
    });
    Schema::table("evaluations",function(Blueprint $table){
        $table->dropForeign("id_poste");
    });
    Schema::table("evaluations",function(Blueprint $table){
        $table->dropForeign("id_competence");
    });
        Schema::dropIfExists('evaluations');
    }
};
