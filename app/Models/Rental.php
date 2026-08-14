<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
        // Un alquiler pertenece a un usuario
    public function user() {
        return $this->belongsTo(User::class);
    }
}
