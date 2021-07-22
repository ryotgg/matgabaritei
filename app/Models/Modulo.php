<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    public function curso() {
        return $this->belongsTo(Curso::class);
    }

    public function aulas() {
        return $this->hasMany(Aula::class);
    }

    public function getRouteKeyName() {
      return 'slug'; 
    }
}
