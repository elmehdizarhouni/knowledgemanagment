<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['nom_competence', 'type'];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}


