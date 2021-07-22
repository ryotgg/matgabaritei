<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">
    <p class="text-md font-bold ml-3 py-3">Aula {{ $aula->order }} - {{ $aula->title }}</p>
    <h1 class="text-xl font-bold ml-3 py-3">Lista - {{ $lista->name }}</h1>

        <br>
        <section class="flex max-w-prose text-base flex-col">
            @foreach($exercicios as $exercicio) 
            <article class="flex-auto mb-2 p-3 bg-white">
                <h2 class="text-lg mt-2 mb-1 font-bold"><a href="{{ route('exercicios.show',$exercicio->id) }} ">Exercicio {{ $exercicio->number }}</a></h2>
            </article>
            @endforeach            

        </section>
        
         <a href="{{ route('exercicios.create', $lista->slug ) }}" class="rounded bg-green-500 text-white p-2 mt-2">Adicionar Exercício</a>   
    </div>
</div>




</x-app-layout>