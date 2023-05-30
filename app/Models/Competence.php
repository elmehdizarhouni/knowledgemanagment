<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Concerns\HasTimestamps;
class Competence extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nom_competence', 'type'];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}


