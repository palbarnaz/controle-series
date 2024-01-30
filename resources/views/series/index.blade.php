<x-layout title="Séries">
    <a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
     <div class="alert alert-success">{{$mensagemSucesso}}</div>
     @endisset


    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item">
            {{ $serie->nome }}

         <div class="container d-flex justify-content-end " style="gap: 10px">
         <form action="/series/destruir/{{$serie->id}}" method="post">
        @csrf
        @method('DELETE')

        <button  class="btn btn-danger btn-sm">
        Apagar
        </button>
        </form>

        <form action="/series/editar/{{$serie->id}}" method="post">
        @csrf
        @method('PUT')

        <button  class="btn btn-success btn-sm">
        Editar
        </button>
        </form>
         </div>

        </li>
        @endforeach
    </ul>
</x-layout>



