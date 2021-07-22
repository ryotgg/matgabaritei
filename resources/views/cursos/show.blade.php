<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">

    <h1 class="text-xl font-bold py-3"><a href="{{ route('cursos.index')}}">Cursos</a> - {{ $curso->name }}</h1>
        <p>Total de módulos {{ $curso->modulo_count }}</p>
        
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <a href="{{ route('cursos.modulos.create',$curso->slug)}}" class="rounded bg-green-500 text-white p-2 mt-6 mb-4 inline-block">Adicionar Módulo</a>

        <section class="flex max-w-prose text-base flex-col">
            
            @foreach($modulos as $modulo) 
            <article class="flex-auto mb-2 p-3 bg-white">
                <h2 class="text-lg mt-2 mb-1 font-bold"><a href="{{route('modulos.show',$modulo->slug)}} ">{{ $modulo->name }}</a></h2>
                <p>{{ $curso->description }}</p>    
            </article>
            @endforeach            

        </section>
        
        @can('edit-aulas', Auth::user())
        <a href="{{ route('cursos.edit',$curso->slug)}}" class="rounded bg-green-500 text-white p-2 mt-2 inline-block">Editar Curso</a>
        @endcan

        @can('edit-aulas', Auth::user())
        <form action="{{ route('cursos.destroy',$curso->slug) }}" method="POST">
            @csrf
            @method('DELETE')
      
            <button type="submit" class="rounded bg-red-500 text-white p-2 mt-2">Delete</button>
        </form>
        @endcan
    </div>
</div>

</x-app-layout>