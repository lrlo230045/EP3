@extends('layouts.app')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-4">

        <div class="card shadow">
            <div class="card-header bg-dark text-white text-center">
                <h4>Iniciar Sesión</h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Ingresar
                    </button>
                    <div class="mt-3 text-center">
    <a href="{{ route('usuarios.create') }}" class="btn btn-success w-100">
        Registrarse
    </a>
</div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection