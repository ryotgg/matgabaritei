<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                alo
            </div>
        </div>
    </div>

    <section class="flex">
        <div class="flex-none">
            <ul>
                <li>CURSOS</li>
                <li><a href="{{route('cursos.index')}"}></a></li>
            </ul>
        </div>
        <div class="flex-auto">
            
        </div>
    </section>

</x-admin-layout>
