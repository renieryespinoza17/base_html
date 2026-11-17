<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    // Mostrar listado de personas
    public function index()
    {
        $personas = Persona::orderBy('id')->get();

        return view('personas.index', compact('personas'));
    }

    // Mostrar formulario para crear una persona
    public function create()
    {
        return view('personas.create');
    }

    // Guardar una persona en la base de datos
    public function store(Request $request)
    {
        $datos = $request->validate([
            'dni' => ['required', 'regex:/^[0-9]{13}$/', 'unique:personas,dni'],
            'nombre' => ['required', 'string', 'max:100'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
        ]);

        $persona = new Persona();
        $persona->dni = $datos['dni'];
        $persona->nombre = $datos['nombre'];
        $persona->fecha_nacimiento = $datos['fecha_nacimiento'];
        $persona->save();

        return redirect()->route('personas.index')
            ->with('exito', 'Persona creada correctamente.');
    }
}
