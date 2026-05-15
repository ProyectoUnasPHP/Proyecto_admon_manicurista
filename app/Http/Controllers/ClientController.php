<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $clients = Client::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%")
                             ->orWhere('phone', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(10);

        return view('clients.index', compact('clients', 'search'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:clients,email',
            'notes' => 'nullable|string|max:1000',
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:clients,email,' . $client->id,
            'notes' => 'nullable|string|max:1000',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Cliente eliminado exitosamente.');
    }

    public function show(Client $client)
    {
        $appointments = $client->appointments()->latest()->get();
        return view('clients.show', compact('client', 'appointments'));
    }
}