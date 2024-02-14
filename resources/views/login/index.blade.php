<x-layout title="Login">


    <form  method="post">
        @csrf
        <div class="row mb-3">


        <div class=" col-12 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" id="email" name="email" class="form-control">

        </div>


        <div class=" col-12 mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="text" id="password"  name="password" class="form-control">

        </div>
        </div>

        <a href="{{route('users.create')}}">Criar uma conta</a>
        <button type="submit" class="btn btn-dark">Entrar</button>
    </form>
</x-layout>
