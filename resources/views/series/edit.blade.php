<x-layout title="Editar Série {{$serie->nome}}">
    <form action="{{route('series.update', $serie->id)}}"  method="post">
        @method('PUT')
        @csrf



        <div class="mb-3">

            <label for="nome" class="form-label">Nome:</label>
            <input type="text"  value="{{$serie->nome}}" id="nome" name="nome" class="form-control">
        </div>

        <button type="submit" class="btn btn-dark">Adicionar</button>
    </form>
</x-layout>
