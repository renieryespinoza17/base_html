
@extends('layouts.app')

@section('contenido')

<h1>INICIAR SESIÓN</h1>

<form method="POST" action="{{ route('login.store') }}">
    @csrf

    <label>Correo electrónico</label>
    <input type="email" name="email" required>

    <br><br>

    <label>Contraseña</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Ingresar</button>
</form>

@endsection
