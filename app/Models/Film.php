<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{

    use HasFactory;

    protected $fillable = ['title','content','release_date'];
    
    
public function acteurs()
{
    return $this->hasMany(Acteur::class);
}

}

