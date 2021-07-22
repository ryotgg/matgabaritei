<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    public function exercicio() {
        return $this->belongsTo(Exercicio::class);
    }

    public function aluno() {
        return $this->belongsTo(Aluno::class);
    }
}
