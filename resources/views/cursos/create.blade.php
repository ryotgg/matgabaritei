<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto">
    
    <h1 class="text-xl font-bold ml-3 py-3"><a href="{{route('cursos.index')}}">Cursos</a></h1>
    
    @if (session('status'))
    <div class="bg-green-400 rounded p-3 mb-3">
        {{ session('status') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="bg-red-400 rounded p-3 mb-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-white">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    <section class="flex max-w-prose text-base flex-col">
        <form action="{{ route('cursos.store')}}" method="POST">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="nome">
            <input type="text" name="slug" value="{{ old('slug') }}" placeholder="slug">

            <input type="submit" value="salvar" class="px-4 py-3">
        </form>
    </section>
    
    </div>
</div>

</x-app-layout>