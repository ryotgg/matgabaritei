<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto">
    
        <h1 class="text-xl font-bold ml-3 py-3">Cursos</h1>

        @if (session('status'))
        <div class="bg-green-400 rounded p-3 mb-3">
            {{ session('status') }}
        </div>
        @endif

        <section class="flex max-w-prose text-base flex-col">
            @foreach($cursos as $curso) 
            <article class="flex-auto mb-2 p-3 bg-white">
                <h2 class="text-lg mt-2 mb-1 font-bold"><a href="/cursos/{{ $curso->slug }} ">{{ $curso->name }}</a></h2>
            </article>
            @endforeach
        </section>
        <a href="{{ route('cursos.create') }}" class="rounded bg-green-500 p4 inline-block">Criar curso</a>
        
        
    </div>
</div>

</x-app-layout>