<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    public function aula() {
        return $this->belongsTo(Aula::class);
    }

    public function exercicios() {
        return $this->hasMany(Exercicio::class);
    }
}
