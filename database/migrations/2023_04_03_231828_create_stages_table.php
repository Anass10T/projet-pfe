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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->float('note_stage')->nullable();
            $table->string('appreciation')->nullable();
            $table->binary('rapport_de_stage')->nullable();
            $table->foreignId('stagiaire_id')->constrained('stagiaire')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('rapport_de_stage_deposer')->default(false);
            $table->boolean('attestation_obtenu')->default(false);
            $table->boolean('projet_deposer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
