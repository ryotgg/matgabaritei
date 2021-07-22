<?php

namespace App\Http\Controllers;

use App\Models\Exercicio;
use App\Models\Lista;
use App\Models\Resposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class ExercicioController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $lista = Lista::where('slug',$slug)->firstOrFail();

        return view('exercicios.create', [
            'lista' => $lista,
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
        $lista = Lista::where('id', $request["lista_id"])->firstOrFail();
        $lista->total_exercicios = $lista->total_exercicios + 1; 
        
        $exercicio = new Exercicio();
        $exercicio->enunciado = $request["content"];
        $exercicio->option_a = $request["option_a"];
        $exercicio->option_b = $request["option_b"];
        $exercicio->option_c = $request["option_c"];
        $exercicio->option_d = $request["option_d"];
        $exercicio->option_e = $request["option_e"];
        $exercicio->option = $request["option"];
        $exercicio->number = $lista->total_exercicios;
        $exercicio->lista_id = $lista->id;

        if($exercicio->save()){
            $lista->save();    
            $request->session()->flash('status', 'Nice, exercício salvo');
        }

        return redirect()->route('listas.index', $lista->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercicio  $exercicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $exercicio = Exercicio::findOrFail($id);
        $user_id = 1; //teste
        $resposta = Resposta::where([
            'user_id' => $user_id,
            'exercicio_id' => $id
        ])->first();     

        if($resposta) {
            $resp_user = $resposta->option;
        } else {
            $resp_user = 'z';
        }
        
        $exercicios = $exercicio->exercicios_list();


        return view('exercicios.show', [
            'lista' => $exercicio->lista,
            'exercicio' => $exercicio,
            'exercicios' => $exercicios, 
            'resposta' => $resp_user,
            'next' => $exercicio->next(),
            'prev' => $exercicio->previous(),
        ]);
    }

    public function responder(Request $request, $id)
    {
        /* $validator = Validator::make($request->all(), [
            'option' => 'required',
        ]);

        if ($validator->passes()) { */ 
        if($request["option"] != "a" && 
            $request["option"] != "b" && 
            $request["option"] != "c" && 
            $request["option"] != "d" && 
            $request["option"] != "e") {
            return response()->json(['error'=> 'Erro na Alternativa']);
        }

        $exercicio = Exercicio::findOrFail($id);      
        $user_id = 1; //teste

        $resposta = Resposta::where([
            'user_id' => $user_id,
            'exercicio_id' => $id
        ])->first();      

        if($resposta === null){  //n existe
            $resposta = new Resposta();
            $resposta->user_id = $user_id;  
            $resposta->exercicio_id = $id;
            $resposta->option = $request["option"];

            $resposta->acertou = ($resposta->option == $exercicio->option) ? 1:0 ;
            $resposta->save();
        
        } else { //existe
            $resposta->option = $request["option"];

            $resposta->acertou = ($resposta->option == $exercicio->option) ? 1:0 ;
            $resposta->update();
        }

        if($resposta->acertou) {
            return response()->json(['acertou'=> true]);
        }
        else {
            return response()->json(['acertou'=> false]);
        }
        //}

        //return response()->json(['error'=>$validator->errors()]);
    }

    public function exercicio_feito(Exercicio $exercicio)
    {
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercicio  $exercicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercicio $exercicio)
    {
        return view('exercicios.edit', [
            'lista' => $exercicio->lista,
            'editor' => true,
            'exercicio' => $exercicio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercicio  $exercicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercicio $exercicio)
    {
        $exercicio->enunciado = $request["content"];
        $exercicio->option_a = $request["option_a"];
        $exercicio->option_b = $request["option_b"];
        $exercicio->option_c = $request["option_c"];
        $exercicio->option_d = $request["option_d"];
        $exercicio->option_e = $request["option_e"];
        $exercicio->option = $request["option"];

        $exercicio->update();
        $request->session()->flash('status', 'BOOM! Exercício editado!');

        return redirect('exercicios/'. $exercicio->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercicio  $exercicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercicio $exercicio)
    {
        //
    }


}
