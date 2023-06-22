<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stagiaire extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "stagiaire";

    protected $fillable = ['cin', 'nom', 'prenom', 'email', 'sexe', 'adresse', 'telephone', 'etablissement', 'filiere','retard_par_heure','total_retard','statut', 'photo'];

    public function taches ()
    {
        return  $this ->hasMany(Tache::class , 'stagiaire_id' , 'id' );
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function stages()
    {
        return $this->hasMany(Stage::class , 'stagiaire_id' , 'id' );
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

}
