
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personas Laravel</title>
</head>
<body>

    <h1>PLANTILLA LARAVEL FUNCIONANDO</h1>

    @auth
        <p>Sesión de {{ auth()->user()->name }}</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    @endauth

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    @yield('contenido')

</body>
</html>
