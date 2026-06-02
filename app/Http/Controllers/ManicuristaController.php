<?php

namespace App\Http\Controllers;

use App\Models\Manicurista;
use App\Models\User; // Usamos el modelo oficial
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash; // Para la contraseña

class ManicuristaController extends Controller
{
    public function index(): View
    {
        $manicuristas = Manicurista::with('usuario')->paginate(10);
        return view('manicuristas.index', compact('manicuristas'));
    }

    public function create(): View
    {
        // Ya no mandamos roles a la vista, porque al crear por aquí, SIEMPRE será manicurista
        return view('manicuristas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:users,email', // Cambiado a tabla users
            'password' => 'required|string|min:8',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        // 1. Crear el usuario oficial de Laravel
        $usuario = User::create([
            'name' => $validated['nombre'], // Mapeamos 'nombre' a 'name'
            'email' => $validated['correo'], // Mapeamos 'correo' a 'email'
            'password' => Hash::make($validated['password']),
        ]);

        // 2. Asignarle el rol de Spatie automáticamente
        $usuario->assignRole('Manicurista');

        // 3. Crear su perfil profesional
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
            'correo' => 'required|email|unique:users,email,' . $manicurista->usuario->id,
            'especialidad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'activo' => 'boolean',
        ]);

        // Actualizar usuario oficial
        $manicurista->usuario->update([
            'name' => $validated['nombre'],
            'email' => $validated['correo'],
        ]);

        // Actualizar datos de manicurista
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

        if ($usuario) {
            $usuario->delete();
        }

        return redirect()->route('manicuristas.index')
                       ->with('success', 'Manicurista eliminada correctamente');
    }
}
