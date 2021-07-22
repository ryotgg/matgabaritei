<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">

    <p><a href="/cursos/{{$curso->slug}}">Curso - {{ $curso->name }}</a></p>
    <p><a href="/modulos/{{$modulo->slug}}">Modulo - {{ $modulo->name }}</a></p>
    <h1 class="text-xl font-bold ml-3 py-3">Aula {{ $aula->order }} - {{ $aula->title }}</h1>

        <section id="aulacontent">{!! $aula->content !!}</section>
        <br>
        <section class="flex max-w-prose text-base flex-col">
            @foreach($listas as $lista) 
            <article class="flex-auto mb-2 p-3 bg-white">
                <h2 class="text-lg mt-2 mb-1 font-bold"><a href="/listas/{{ $lista->slug }} ">{{ $lista->name }}</a></h2>
            </article>
            @endforeach            

        </section>
        
         <a href="/aulas/{{$aula->slug}}/addlista" class="rounded bg-green-500 text-white p-2 mt-2">Adicionar Lista de Exercícios</a>   
    </div>
</div>


<script>
 var quill = new Quill('#aulacontent', {
    modules: {
    },
    theme: 'snow'
  });


quill.setContents([{{$aula->content}}]);

</script>




</x-app-layout>