<x-app-layout>   
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">
    
    <h1 class="text-xl font-bold ml-3 py-3">Criar lista nova na aula - {{$aula->name}}</h1>

    <section class="flex max-w-prose text-base flex-col">
        <form action="/listas" method="POST">
            @csrf
            <input type="text" name="name" value="" placeholder="nome da lista">
            <br>
            <input type="text" name="slug" value="" placeholder="slug">
            <br>
       
            <input type="hidden" name="aula_id" value="{{ $aula->id }}">
            <input type="hidden" name="crypt_id" value="{{ $crypt_id }}">
            <input type="submit" value="salvar" class="rounded bg-green-500 text-white p-2 mt-2">
        </form>
    </section>
    
    </div>
</div>

</x-app-layout>