<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">
    
    <h1 class="text-xl font-bold ml-3 py-3">Modulos do Curso</h1>

    <section class="flex max-w-prose text-base flex-col">
        @foreach($cursos as $curso) 
        <article class="flex-auto mb-2 p-3 bg-white">
            <h2 class="text-lg mt-2 mb-1 font-bold"><a href="/curso/{{ $curso->slug }} ">{{ $curso->title }}</a></h2>
            <p>{{-- $curso->content --}}</p>    
        </article>
        @endforeach
    </section>
    
    </div>
</div>

</x-app-layout>