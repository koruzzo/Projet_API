<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    use HasFactory;
    protected $fillable = ['Nom','Prenom','film_id'];


    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

}
