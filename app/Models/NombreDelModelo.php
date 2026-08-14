<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    // 1. Nombre exacto de la tabla en tu BD existente
    protected $table = 'peliculas'; 

    // 2. Clave primaria (si no se llama 'id')
    protected $primaryKey = 'id';

    // 3. Desactivar timestamps si tu tabla no tiene columnas created_at / updated_at
    public $timestamps = false; 

    // 4. Campos que se pueden llenar de forma masiva
    protected $fillable = ['titulo', 'poster', 'sinopsis'];
}