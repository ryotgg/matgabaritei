<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">
    
    <h1 class="text-xl font-bold ml-3 py-3">Criar módulo novo em {{$curso->name}}</h1>

    <section class="flex max-w-prose text-base flex-col">
        <form action="{{route('cursos.modulos.store', $curso->slug)}}" method="POST">
            @csrf
            <input type="text" name="name" value="" placeholder="nome">
            <input type="text" name="slug" value="" placeholder="slug">
            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
            <input type="hidden" name="crypt_id" value="{{ $crypt_id }}">
            <input type="submit" value="salvar">
        </form>
    </section>
    
    </div>
</div>

</x-app-layout>