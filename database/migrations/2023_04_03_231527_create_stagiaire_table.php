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
        Schema::create('stagiaire', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('etablissement');
            $table->string('filiere');
            $table->string('encadrant');
            $table->string('photo');
            $table->binary('cv');
            $table->string('niveau_etude');
            $table->string('diplome_prepare');
            $table->text('motivation');
            $table->string('statut')->default('en attente');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaire');
    }
};
