<?php

namespace App\Http\Controllers;

use App\Models\Manicurista;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ManicuristaController extends Controller
{
    public function index(): View
    {
        $manicuristas = Manicurista::with('usuario')->paginate(10);
        return view('manicuristas.index', compact('manicuristas'));
    }

    public function create(): View
    {
        $roles = Rol::all();
        return view('manicuristas.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios',
            'password' => 'required|string|min:6',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        // Obtener rol por defecto o crear uno
        $rol = Rol::firstOrCreate(
            ['nombre_rol' => 'manicurista'],
            ['descripcion' => 'Personal de manicura']
        );

        // Crear usuario
        $usuario = Usuario::create([
            'nombre' => $validated['nombre'],
            'correo' => $validated['correo'],
            'password' => bcrypt($validated['password']),
            'id_rol' => $rol->id,
        ]);

        // Crear manicurista
        Manicurista::create([
            'id_usuario' => $usuario->id,
            'especialidad' => $validated['especialidad'],
            'telefono' => $validated['telefono'] ?? null,
        ]);

        return redirect()->route('manicuristas.index')
                       ->with('success', 'Manicurista creada correctamente');
    }

    public function show(Manicurista $manicurista): View
    {
        return view('manicuristas.show', compact('manicurista'));
    }

    public function edit(Manicurista $manicurista): View
    {
        return view('manicuristas.edit', compact('manicurista'));
    }

    public function update(Request $request, Manicurista $manicurista): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo,' . $manicurista->usuario->id,
            'especialidad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'activo' => 'boolean',
        ]);

        // Actualizar usuario
        $manicurista->usuario->update([
            'nombre' => $validated['nombre'],
            'correo' => $validated['correo'],
        ]);

        // Actualizar manicurista
        $manicurista->update([
            'especialidad' => $validated['especialidad'],
            'telefono' => $validated['telefono'] ?? null,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('manicuristas.index')
                       ->with('success', 'Manicurista actualizada correctamente');
    }

    public function destroy(Manicurista $manicurista): RedirectResponse
    {
        $usuario = $manicurista->usuario;
        $manicurista->delete();
        $usuario->delete();

        return redirect()->route('manicuristas.index')
                       ->with('success', 'Manicurista eliminada correctamente');
    }
}
