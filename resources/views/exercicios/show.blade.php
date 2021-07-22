<?php 
if($resposta == $exercicio->option) {
    $acertou = true;
} else {
    $acertou = false;
}

$alternativas = "px-5  py-2 cursor-pointer rounded alternativas";

?>

<x-app-layout>

<section id="banner" class="bg-red-300 max-w-screen-lg mx-auto rounded-lg mt-5 mb-5">
    <div class="flex p-5">
        <div class="img pr-5">
            <img src="/images/bixin.png" alt="" class="w-20">
        </div>
        <div class="text-white">
            <p>{{ $lista->Aula->Modulo->Curso->name }} - Módulo {{ $lista->Aula->Modulo->order }}: {{ $lista->Aula->Modulo->name }}</p>
            <p class="text-3xl font-bold">{{ $lista->Aula->title }}</p>
            <p>{{ $lista->name }}</p>
        </div>
    </div>
</section>    

<section id="conteudo" class="max-w-screen-lg mx-auto flex">
    <section id="col-esq"  class="flex-auto">
        <h2 class="font-bold text-2xl mb-3">Questão {{ $exercicio->number }}/{{$lista->total_exercicios}}</h2>
        <div id="aulacontent">{!! $exercicio->enunciado !!}</div>
        <br>
        <form action="{{ route('exercicios.store',  $exercicio->id)}}" method="POST">
            @csrf

            <div class="mb-5">
                <input type="button" value="(a) {{ $exercicio->option_a }}" class="{{ $alternativas }} {{ ($resposta =='a') ? ($acertou ?'bg-green-400' : 'bg-red-400') : '' }}" data-option="a">

                <input type="button" value="(b) {{ $exercicio->option_b }}" class="{{ $alternativas }} {{ ($resposta =='b') ? ($acertou ?'bg-green-400' : 'bg-red-400') : '' }}" data-option="b">

                <input type="button" value="(c) {{ $exercicio->option_c }}" class="{{ $alternativas }} {{ ($resposta =='c') ? ($acertou ?'bg-green-400' : 'bg-red-400') : '' }}" data-option="c">

                <input type="button" value="(d) {{ $exercicio->option_d }}" class="{{ $alternativas }} {{ ($resposta =='d') ? ($acertou ?'bg-green-400' : 'bg-red-400') : '' }}" data-option="d">

                <input type="button" value="(e) {{ $exercicio->option_e }}" class="{{ $alternativas }} {{ ($resposta =='e') ? ($acertou ?'bg-green-400' : 'bg-red-400') : '' }}" data-option="e">

                <input type="hidden" value="{{ $exercicio->option }}" name="rfinal" id="resp">
            </div>
        </form>       

        <section id="modal_acertou" class="{{ ($acertou) ? '' : 'hidden' }} flex h-auto pt-4 px-4 pb-4 bg-green-400 rounded-lg text-left align-bottom bg-white rounded-lg shadow-xl transform transition-all w-auto mb-5">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-24 w-24 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <!-- ícone -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Parabéns! Seu cérebro cresceu um pouco!
                </h3>
                <div class="mt-2">
                  <p class="text-sm text-white">
                    Você ganhou 10 brain points
                  </p>
                </div>
            </div>
        </section>
        <section id="modal_errou" class="{{ (!$acertou) ? '' : 'hidden' }} flex h-auto pt-4 px-4 pb-4 rounded-lg text-left align-bottom bg-white rounded-lg shadow-xl transform transition-all w-auto mb-5 bg-red-400">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-24 w-24 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <!-- ícone -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Resposta Errada! Mas relaxa!
                </h3>
                <div class="mt-2">
                  <p class="text-sm text-white">
                    Volte para as aulas e tente de novo
                  </p>
                </div>
            </div>
        </section>

        

        <section id="prev_next" class="flex justify-between">
            @if($prev != null)
            <a href="{{ route('exercicios.show', $prev->id )}}" class="bg-gray-200 p-3 rounded-lg">Anterior</a>
            @else 
            <!-- não remova isso, faz o "proximo" ir para a direita" -->
            <div></div>
            @endif

            @if($next != null)
            <a href="{{ route('exercicios.show', $next->id )}}" class="bg-gray-200 p-3 rounded-lg">Próximo</a>
            @endif
        </section>
    </section>
    <section id="col-dir" class="flex-none w-64 p-5">
        <ul id="lista_exercicios">
            @foreach($exercicios as $ex) 
                <li class="{{ ($ex->acertou) ? 'bg-green-400':'bg-gray-50'  }}  p-3 mb-1"><a href="{{ route('exercicios.show', $ex->id )}}">Exercício {{ $ex->number }}</a></li>
            @endforeach
        </ul>
    </section>

    

</section>





<script>

function clearButtons(){
    $('.alternativas').removeClass("bg-green-400").removeClass("bg-red-400");
}

$(document).ready(function() {
  
    $(".alternativas").click(function(e){
        e.preventDefault();
        clearButtons();

        var _token = $("input[name='_token']").val();
        var option = $(this).attr("data-option");

        var resp = $("#resp").val();
        if(resp == option){
            $(this).addClass("bg-green-400"); 
        } else {
            $(this).addClass("bg-red-400"); 
        }

        $.ajax({
            url: "{{ route('exercicios.responder', $exercicio->id) }}",
            type:'POST',
            data: {
                _token:_token, 
                option:option
            },
            success: function(data) {
              printMsg(data);
            }
        });
    }); 

    function printMsg (msg) {
        if($.isEmptyObject(msg.error)){
            if(msg.acertou){
              $("#modal_acertou").removeClass("hidden");
              $("#modal_errou").addClass("hidden");
              //$(modal).html('<p class="text-green-400">Resposta Correta! Parabéns!</p>');  
            }
            else {
              $("#modal_errou").removeClass("hidden");
              $("#modal_acertou").addClass("hidden");
              //$('.alert-box').html('<p class="text-red-500">Resposta Errada! Parabéns!</p>');   
            }
            
        } else {
            $.each( msg.error, function( key, value ) {
                $('.error-box').text('<p>'+ value +'</p>');
            });
        }
    }
});

</script>

</x-app-layout>