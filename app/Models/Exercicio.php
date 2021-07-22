<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exercicio extends Model
{
    use HasFactory;

    public function lista() {
        return $this->belongsTo(Lista::class);
    }

    public function respondidopor() {
        return $this->hasOne(Resposta::class);
    }

    public function next(){
        // get next user
        return Exercicio::where('number', '>', $this->number)->where('lista_id',$this->lista->id)->orderBy('number','asc')->first();
    }
    public  function previous(){
        // get previous  user
        return Exercicio::where('number', '<', $this->number)->where('lista_id',$this->lista->id)->orderBy('number','asc')->first();
    }

    public  function exercicios_list() {
        return DB::table('exercicios')
            ->join('respostas', 'exercicios.id','=','respostas.exercicio_id')
            ->select('exercicios.id', 'exercicios.number', 'respostas.acertou')
            ->where('exercicios.lista_id', $this->lista_id)
            ->orderBy('exercicios.number')
            ->get();
    }
}
