<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Concerns\HasTimestamps;
class Evaluateur extends Model
{
   
    protected $fillable = ['name', 'email']; // Les colonnes que vous souhaitez pouvoir remplir

    protected $hidden = ['password']; // Les colonnes que vous souhaitez masquer lors de la récupération du modèle

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


