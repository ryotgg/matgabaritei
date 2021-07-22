<x-app-layout>
    
<div class="max-h-max">
    <div class="max-w-screen-lg mx-auto bg-gray-50">
    
    <h1 class="text-xl font-bold ml-3 py-3">Artigos</h1>

    <section class="flex max-w-prose text-base flex-col">
        @foreach($articles as $article) 
        <article class="flex-auto mb-2 p-3 bg-white">
            <h2 class="text-lg mt-2 mb-1 font-bold"><a href="/article/{{ $article->slug }} ">{{ $article->title }}</a></h2>
            <p>{{ $article->content }}</p>    
        </article>
        @endforeach
    </section>
    
    </div>
</div>

</x-app-layout>