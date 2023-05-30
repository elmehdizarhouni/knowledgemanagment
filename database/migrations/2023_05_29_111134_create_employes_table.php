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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('adresse');
            $table->string('email')->unique()->nullable();
            $table->string('telephone')->nullable();
            $table->date('date_embauche')->nullable();
            $table->unsignedBigInteger('id_poste')->nullable()->unsigned();
            $table->foreign('id_poste')->references('id')->on('postes');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {    Schema::table("employes",function(Blueprint $table){
        $table->dropForeign("id_poste");
    });
        Schema::dropIfExists('employes');
    }
};
