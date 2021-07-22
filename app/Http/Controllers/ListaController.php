<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Models\Aula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ListaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $aula = Aula::where('slug',$slug)->firstOrFail();

        return view('listas.create', [
            'aula' => $aula, 
            'crypt_id' => Crypt::encryptString($aula->id), //criptografa o id do lista para verificacao
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aula = Aula::where('id', $request["aula_id"])->firstOrFail();
        //$modulo->aulas_count = $modulo->aulas_count + 1; 
        
        $lista = new Lista();
        $lista->name = $request["name"];
        $lista->slug = $request["slug"];
        $lista->total_exercicios = 0;
        $lista->aula_id = $aula->id;

        if(Crypt::decryptString($request["crypt_id"]) == $request["aula_id"]) 
        {
            //$modulo->save();
            $lista->save();
            return redirect('listas/'. $lista->slug);
        }
        else {
            return view('listas.create', [
                'aula' => $aula, 
                'crypt_id' => Crypt::encryptString($aula->id),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $lista = Lista::where('slug',$slug)->firstOrFail();

        return view('listas.show', [
            'lista' => $lista,
            'aula' => $lista->aula,
            'exercicios' => $lista->exercicios,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista $lista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista)
    {
        //
    }
}
