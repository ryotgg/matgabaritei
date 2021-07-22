<x-app-layout>   
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">
    
    <h1 class="text-xl font-bold ml-3 py-3">Criar ex na lista - {{$lista->name}}</h1>

    <section class="flex max-w-prose text-base flex-col">
        <form action="{{ route('exercicios.store')}}" method="POST">
            @csrf
            <label for="content">Enunciado</label> <br>
            
            <x-editor />

            <br>
            <label for="option_a">A) </label>
            <input type="text" name="option_a" value="{{old('option_a')}}" placeholder="Opção A">       
            <br>

            <label for="option_b">B) </label>
            <input type="text" name="option_b" value="{{old('option_b')}}" placeholder="Opção B">       
            <br>

            <label for="option_c">C) </label>
            <input type="text" name="option_c" value="{{old('option_c')}}" placeholder="Opção C">       
            <br>

            <label for="option_d">D) </label>
            <input type="text" name="option_d" value="{{old('option_d')}}" placeholder="Opção D">       
            <br>

            <label for="option_e">E) </label>
            <input type="text" name="option_e" value="{{old('option_e')}}" placeholder="Opção E">       
            <br>

            <label for="option">Gabarito</label> <br>
            <select name="option" id="Resposta">
                <option value="a">Opção A</option>
                <option value="b">Opção B</option>
                <option value="c">Opção C</option>
                <option value="d">Opção D</option>
                <option value="e">Opção E</option>
            </select>
            <input type="hidden" name="lista_id" value="{{ $lista->id }}">
            <input type="submit" value="Adicionar" class="rounded bg-green-500 text-white p-2 mt-2">

        </form>
    </section>
    
    </div>
</div>


</x-app-layout>