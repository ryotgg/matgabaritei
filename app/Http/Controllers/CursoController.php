<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Requests\CursoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', ['cursos' =>  $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create', ['msg' => '']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $validated = $request->validated();

        $curso = new Curso();
        $curso->name = $validated["name"];
        $curso->slug = $validated["slug"];
        $curso->save();   
       
        $request->session()->flash('status', 'BOOM! Curso criado!');
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $curso = Curso::where('slug',$slug)->firstOrFail();
        
        return view('cursos.show', [
            'curso' => $curso,
            'modulos' => $curso->modulos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('cursos.edit', [
            'curso' => $curso
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        $validated = $request->validated();
        $curso->name = $validated["name"];
        $curso->slug = $validated["slug"];
        $curso->update();
        
        $request->session()->flash('status', 'Zap! Curso editado!');
        
        return redirect()->route('cursos.show', $curso->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
    
        return redirect()->route('cursos.index')
                        ->with('success','Curso sucumbido');
    }
}
