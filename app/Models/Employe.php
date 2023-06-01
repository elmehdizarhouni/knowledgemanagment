<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Concerns\HasTimestamps;

class Employe extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'nom' ,
        'prenom' ,
        'adresse' ,
        'email' ,
        'telephone' ,
        'date_embauche' ,
        'id_poste' ,


    ];
    public function poste()
{
    return $this->belongsTo(Poste::class, 'id_poste');
}

    public function formations()
    {
        return $this->hasMany(Formation::class,'employe_id');
    }

    public function competences()
    {
        return $this->hasMany(Competence::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }


}
