<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AulaController extends Controller
{
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($modulo_slug)
    {
        $modulo = Modulo::where('slug',$modulo_slug)->firstOrFail();

        return view('aulas.create', [
            'modulo' => $modulo, 
            'crypt_id' => Crypt::encryptString($modulo->id), //criptografa o id do modulo para verificacao
            'editor' => true,
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

        $modulo = Modulo::where('id', $request["modulo_id"])->firstOrFail();
        $modulo->aulas_count = $modulo->aulas_count + 1; 
        

        $aula = new Aula();
        $aula->title = $request["title"];
        $aula->slug = $request["slug"];
        $aula->content = $request["content"];
        $aula->modulo_id = $modulo->id;
        $aula->order = $modulo->aulas_count;
        
        if(Crypt::decryptString($request["crypt_id"]) == $request["modulo_id"]) 
        {
            $modulo->save();
            $aula->save();
            return redirect('modulos/'.$modulo->slug);
        }
        else {
            return view('aulas.create', [
                'modulo' => $modulo, 
                'crypt_id' => Crypt::encryptString($modulo->id),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $aula = Aula::where('slug',$slug)->firstOrFail();
        return view('aulas.show', [
            'aula' => $aula,
            'modulo' => $aula->modulo,
            'curso' => $aula->modulo->curso,
            'listas' => $aula->listas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function edit(Aula $aula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aula $aula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aula $aula)
    {
        //
    }
}
