<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">

    <p><a href="/cursos/{{$curso->slug}}">Curso - {{ $curso->name }}</a></p>
    <h1 class="text-xl font-bold ml-3 py-3">Módulo {{ $modulo->order }} - {{ $modulo->name }}</h1>

        
        <section class="flex max-w-prose text-base flex-col">
            <p>Total de aulas: {{ $modulo->aulas_count }}</p>
            @foreach($aulas as $aula) 
            <article class="flex-auto mb-2 p-3 bg-white">
                <h2 class="text-lg mt-2 mb-1 font-bold"><a href="/aulas/{{ $aula->slug }} ">Aula {{ $aula->order }} - {{ $aula->title }}</a></h2>
                <p>{{--  --}}</p>    
            </article>
            @endforeach            

        </section>
        
         <a href="/modulos/{{$modulo->slug}}/addaula" class="rounded bg-green-500 text-white p-2 mt-2">Adicionar Aula</a>   
    </div>
</div>

</x-app-layout>