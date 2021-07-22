<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class ModuloController extends Controller
{
    //INDEX = CursoController->show();


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $curso = Curso::where('slug',$slug)->firstOrFail();
        //dd($slug);
        return view('modulos.create', [
            'curso' => $curso, 
            'crypt_id' => Crypt::encryptString($curso->id),
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
        $curso = Curso::find($request["curso_id"]);
        $curso->modulo_count = $curso->modulo_count + 1; 
        
        $modulo = new Modulo();
        $modulo->name = $request["name"];
        $modulo->slug = $request["slug"];
        $modulo->curso_id = $request["curso_id"];
        $modulo->order = $curso->modulo_count;

        
        if(Crypt::decryptString($request["crypt_id"]) == $request["curso_id"]) 
        {
            $curso->save();
            $modulo->save();
            return redirect('cursos/'.$curso->slug);
        }
        else {
            return view('modulos.create', [
                'curso' => $curso, 
                'crypt_id' => Crypt::encryptString($curso->id),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $modulo = Modulo::where('slug',$slug)->firstOrFail();

        return view('modulos.show',[
            'modulo'=> $modulo,
            'curso' => $modulo->curso,
            'aulas' => $modulo->aulas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        //
    }
}
