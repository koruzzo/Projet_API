<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    use HasFactory;
    protected $fillable = ['Nom','Prenom','film_id'];


    public function films()
    {
        return $this->belongsTo(Film::class);
    }

}
