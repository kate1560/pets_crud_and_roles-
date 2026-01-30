<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ADMIN ve todos
        if ($user->role === 'admin') {
            $animals = Animal::orderBy('species')
                ->orderBy('name')
                ->paginate(10);
        } 
        // USER ve solo los suyos
        else {
            $animals = Animal::where('user_id', $user->id)
                ->orderBy('species')
                ->orderBy('name')
                ->paginate(10);
        }

        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $speciesOptions = Animal::SPECIES;
        return view('animals.create', compact('speciesOptions'));
    }

    public function store(StoreAnimalRequest $request)
    {
        Animal::create([
            ...$request->validated(),
            'user_id' => Auth::id(), // dueño del animal
        ]);

        return redirect()
            ->route('animals.index')
            ->with('success', 'Animal creado correctamente.');
    }

    public function show(Animal $animal)
    {
        $this->authorizeAccess($animal);
        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        $this->authorizeAccess($animal);
        $speciesOptions = Animal::SPECIES;
        return view('animals.edit', compact('animal', 'speciesOptions'));
    }

    public function update(UpdateAnimalRequest $request, Animal $animal)
    {
        $this->authorizeAccess($animal);

        $animal->update($request->validated());

        return redirect()
            ->route('animals.index')
            ->with('success', 'Animal actualizado correctamente.');
    }

    public function destroy(Animal $animal)
    {
        $this->authorizeAccess($animal);

        $animal->delete();

        return redirect()
            ->route('animals.index')
            ->with('success', 'Animal eliminado correctamente.');
    }

    // 🔒 Seguridad centralizada
    private function authorizeAccess(Animal $animal)
    {
        $user = Auth::user();

        // Admin puede todo
        if ($user->role === 'admin') {
            return true;
        }

        // Usuario solo lo suyo
        if ($animal->user_id !== $user->id) {
            abort(403, 'No tienes permiso para acceder a este recurso');
        }
    }
}
