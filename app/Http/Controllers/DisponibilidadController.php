<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use App\Models\Manicurista;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DisponibilidadController extends Controller
{
    public function index(): View
    {
        $disponibilidades = Disponibilidad::with('manicurista.usuario')->paginate(15);
        return view('disponibilidades.index', compact('disponibilidades'));
    }

    public function create(): View
    {
        $manicuristas = Manicurista::with('usuario')->where('activo', true)->get();
        $dias = Disponibilidad::getDiasSemanales();
        return view('disponibilidades.create', compact('manicuristas', 'dias'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_manicurista' => 'required|exists:manicuristas,id',
            'dia_semana' => 'required|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        Disponibilidad::create($validated);

        return redirect()->route('disponibilidades.index')
                       ->with('success', 'Disponibilidad creada correctamente');
    }

    public function show(Disponibilidad $disponibilidad): View
    {
        return view('disponibilidades.show', compact('disponibilidad'));
    }

    public function edit(Disponibilidad $disponibilidad): View
    {
        $manicuristas = Manicurista::with('usuario')->where('activo', true)->get();
        $dias = Disponibilidad::getDiasSemanales();
        return view('disponibilidades.edit', compact('disponibilidad', 'manicuristas', 'dias'));
    }

    public function update(Request $request, Disponibilidad $disponibilidad): RedirectResponse
    {
        $validated = $request->validate([
            'id_manicurista' => 'required|exists:manicuristas,id',
            'dia_semana' => 'required|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        $disponibilidad->update($validated);

        return redirect()->route('disponibilidades.index')
                       ->with('success', 'Disponibilidad actualizada correctamente');
    }

    public function destroy(Disponibilidad $disponibilidad): RedirectResponse
    {
        $disponibilidad->delete();

        return redirect()->route('disponibilidades.index')
                       ->with('success', 'Disponibilidad eliminada correctamente');
    }
}
