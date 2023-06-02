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
            $table->unsignedBigInteger('competence_id')->unsigned();
           
            $table->integer('note');
            $table->string('commentaire');
            $table->unsignedBigInteger('evaluateur_id')->unsigned();
            $table->foreign('evaluateur_id')->references('id')->on('evaluateurs');
            $table->foreign('id_employe')->references('id')->on('employes');
            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');;
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { Schema::table("evaluations",function(Blueprint $table){
        $table->dropForeign("evaluateur_id");
    });
    Schema::table("evaluations",function(Blueprint $table){
        $table->dropForeign("id_employe");
    });
 
    Schema::table("evaluations",function(Blueprint $table){
        $table->dropForeign("competence_id");
    });
        Schema::dropIfExists('evaluations');
    }
};
