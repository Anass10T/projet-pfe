<?php

namespace App\Models;

use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stage extends Model
{
    use HasFactory;
    public $table = "stages";

    protected $fillable=['stagiaire_id','date_debut','date_fin','note_stage','appreciation','rapport_de_stage_deposer','attestation_obtenu','projet_deposer'];

   public function stagiaire ()
    {
        return  $this ->belongsTo( Stagiaire :: class , 'stagiaire_id' , 'id' );
    

}
}