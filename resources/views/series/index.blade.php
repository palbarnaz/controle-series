<x-layout title="Séries">
    @auth
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth
    @isset($mensagemSucesso)
     <div class="alert alert-success">{{$mensagemSucesso}}</div>
     @endisset


    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item">
        @auth
        <a href="{{ route('temporadas.index', $serie->id) }}">
        @endauth
                {{ $serie->nome }}
        @auth
        </a>
        @endauth
         <div class="container d-flex justify-content-end " style="gap: 10px">
         @auth
         <form action="{{ route('series.destroy', $serie->id) }}" method="post">
        @csrf
        @method('DELETE')

        <button  class="btn btn-danger btn-sm">
        Apagar
        </button>
        </form>

        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                    Editar
        </a>
        @endauth
         </div>

        </li>
        @endforeach
    </ul>
</x-layout>



