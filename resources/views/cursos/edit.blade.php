<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">
    
    <h1 class="text-xl font-bold ml-3 py-3">Cursos</h1>
    
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    
    <section class="flex max-w-prose text-base flex-col">
        <form action="{{ route('cursos.update', $curso->slug )}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $curso->name }}" placeholder="nome">
            <input type="text" name="slug" value="{{ $curso->slug }}" placeholder="slug">

            <input type="submit" value="salvar">
        </form>
    </section>
    
    </div>
</div>

</x-app-layout>