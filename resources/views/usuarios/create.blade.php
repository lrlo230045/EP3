<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Crear Usuario</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control"
                           placeholder="Ingrese nombre" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="Ingrese email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Ingrese contraseña" required>
                </div>
                @if(Auth::check() && Auth::user()->tipo == 'admin')
                <div class="mb-3">
                    <label class="form-label">Tipo de Usuario</label>
                    <select name="tipo" class="form-control">
                        <option value="usuario">Usuario normal</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                @endif

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                    Volver
                </a>
            </form>

        </div>
    </div>
</div>

</body>
</html>