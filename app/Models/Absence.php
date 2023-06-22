<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    public $table = "absences";
  
    protected $fillable = [
        'date_absence',
        'type_absence',
        'justification',
        'stagiaire_id'
    ];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class,'stagiaire_id','id'  );
    }
}
