<x-layout title="Cadastrar Usuário">


    <form   method="post">
        @csrf
        <div class="row mb-3">

        <div class=" col-12 mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-control">

        </div>

        <div class=" col-12 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" id="email" name="email" class="form-control">

        </div>


        <div class=" col-12 mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" id="password"  name="password" class="form-control">

        </div>
        </div>


        <button type="submit" class="btn btn-dark">Cadastrar</button>
    </form>
</x-layout>
