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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('nom_tache');
            $table->text('description');
            $table->date('date_debut');
            $table->date('date_fin');
            //$table -> unsignedBigInteger ( 'stagiaire_id' );
            $table -> foreignId( 'stagiaire_id' )->references( 'id' )->on( 'stagiaire' )->onDelete( 'cascade' );
        //    $table->foreignId('stagiaire_id')->constrained('stagiaire')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
