<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{protected $fillable = [
    'id_employe',
    'id_poste',
    'id_competence',
    'date_evaluation',
    'note' ,
    'commentaire' ,
    'id_evaluateur',

];
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'id_employe');
    }
    
    public function poste()
    {
        return $this->belongsTo(Poste::class, 'id_poste');
    }
    
    public function competence()
    {
        return $this->belongsTo(Competence::class, 'id_competence');
    }
    
    public function evaluateur()
    {
        return $this->belongsTo(Evaluateur::class, 'id_evaluateur');
    }
    
    public $timestamps = false;
    use HasFactory;
}
