<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Models\Animal;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $query = Animal::query()->with('owner');

        // Admin ve todo, user solo lo suyo
        if ($user->role !== 'admin') {
            $query->where('user_id', $user->id);
        }

        $animals = $query->latest()->paginate(10);

        return view('animals.index', compact('animals'));
    }

    // ✅ ESTE ES EL QUE TE FALTABA (para el botón VER)
    public function show(Animal $animal)
    {
        $this->authorizeOwnerOrAdmin($animal);

        return view('animals.show', [
            'animal' => $animal->load('owner'),
            'speciesOptions' => Animal::SPECIES,
        ]);
    }

    public function create()
    {
        return view('animals.create', [
            'speciesOptions' => Animal::SPECIES,
        ]);
    }

    public function store(StoreAnimalRequest $request)
    {
        $data = $request->validated();

        // Guardar imagen obligatoria
        $path = $request->file('image')->store('animals', 'public');
        $data['image_path'] = $path;

        // Dueño = usuario logueado
        $data['user_id'] = auth()->id();

        Animal::create($data);

        return redirect()->route('animals.index')
            ->with('success', 'Animal creado correctamente.');
    }

    public function edit(Animal $animal)
    {
        $this->authorizeOwnerOrAdmin($animal);

        return view('animals.edit', [
            'animal' => $animal,
            'speciesOptions' => Animal::SPECIES,
        ]);
    }

    public function update(UpdateAnimalRequest $request, Animal $animal)
    {
        $this->authorizeOwnerOrAdmin($animal);

        $data = $request->validated();

        // Si suben nueva imagen, reemplaza
        if ($request->hasFile('image')) {
            if ($animal->image_path) {
                Storage::disk('public')->delete($animal->image_path);
            }
            $data['image_path'] = $request->file('image')->store('animals', 'public');
        }

        $animal->update($data);

        return redirect()->route('animals.index')
            ->with('success', 'Animal actualizado correctamente.');
    }

    public function destroy(Animal $animal)
    {
        $this->authorizeOwnerOrAdmin($animal);

        if ($animal->image_path) {
            Storage::disk('public')->delete($animal->image_path);
        }

        $animal->delete();

        return redirect()->route('animals.index')
            ->with('success', 'Animal eliminado correctamente.');
    }

    private function authorizeOwnerOrAdmin(Animal $animal): void
    {
        $user = auth()->user();

        if ($user->role === 'admin') return;

        abort_if($animal->user_id !== $user->id, 403);
    }
}
