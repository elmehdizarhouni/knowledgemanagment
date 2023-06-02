<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{protected $fillable = [
    'id_employe',
    'competence_id',
    
    'note' ,
    'commentaire' ,
    'evaluateur_id',

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
        return $this->belongsTo(Competence::class, 'competence_id');
    }
    
    public function evaluateur()
    {
        return $this->belongsTo(Evaluateur::class, 'evaluateur_id');
    }
    
    public $timestamps = false;
    use HasFactory;
}
