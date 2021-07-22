<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        @if($editor = true)
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css">

        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        @endif
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen">
            {{-- @livewire('navigation-menu')--}}
            
            <div class="max-h-max bg-black">
                <div class="max-w-screen-lg flex text-white mx-auto justify-between py-3">
                    <div class="flex-none text-lg font-bold">
                        GABARITEI
                    </div>
                    <div class="flex-none">
                        <ul class="flex flex-row justify-right">
                            <li class="px-4">home</li>
                            <li class="px-4"><a href="/cursos/mat">matemática</a></li>
                            <li class="px-4"><a href="/cursos/red">redação</a></li>
                        </ul>

                    </div>
                </div>
            </div>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
