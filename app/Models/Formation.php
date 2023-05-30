<?php

namespace App\Models;
use \Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{public $timestamps = false;
    protected $fillable = ['nom_formation', 'description_formation'];

    public function employe()
    {
        return $this->belongsTo(Employe::class,'employe_id');
    }
    
}
