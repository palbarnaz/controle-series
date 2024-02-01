<x-layout title="Editar Série {{$serie->nome}}">
    <form action="/series/salvarEdicao/{{$serie->id}}" method="post">

        @csrf
        @method('PUT')
        <div class="mb-3">

            <label for="nome" class="form-label">Nome:</label>
            <input type="text"  value="{{$serie->nome}}" id="nome" name="nome" class="form-control">
        </div>

        <button type="submit" class="btn btn-dark">Adicionar</button>
    </form>
</x-layout>
