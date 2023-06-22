<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    public $table = "taches";

    protected $fillable=['stagiaire_id','nom_tache','description','date_debut','date_fin'];

   public function stagiaire ()
    {
        return  $this ->belongsTo( Stagiaire :: class , 'stagiaire_id' , 'id' );
    }

}