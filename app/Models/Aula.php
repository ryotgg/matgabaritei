<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    public function modulo() {
        return $this->belongsTo(Modulo::class);
    }

    public function listas() {
        return $this->hasMany(Lista::class);
    }
}
