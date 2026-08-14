<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // Permite que Laravel escriba los datos en estas columnas de MySQL
    protected $fillable = ['title', 'year', 'director', 'poster', 'synopsis', 'rented'];
}
