<x-layout title="Nova Série">


    <form  action="{{ route('series.store') }}" method="post">
        @csrf
        <div class="row mb-3">
        <div class=" col-8 mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" value="{{ old('nome') }}" name="nome" class="form-control">

        </div>

        <div class=" col-2 mb-3">
            <label for="temporadas" class="form-label">Nº temporadas:</label>
            <input type="text" id="temporadas" name="temporadas" class="form-control">

        </div>


        <div class=" col-2 mb-3">
            <label for="episodios" class="form-label">Nº Eps/Temporada</label>
            <input type="text" id="episodios"  name="episodios" class="form-control">

        </div>
        </div>


        <button type="submit" class="btn btn-dark">Adicionar</button>
    </form>
</x-layout>
