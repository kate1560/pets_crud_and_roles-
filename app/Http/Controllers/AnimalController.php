<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::query()
            ->orderBy('species')
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('animals.index', compact('animals'));  
    }

    public function create()
    {
        $speciesOptions = Animal::SPECIES;
        return view('animals.create', compact('speciesOptions'));
    }

    public function store(StoreAnimalRequest $request)
    {
        Animal::create($request->validated());

        return redirect()
            ->route('animals.index')
            ->with('success', 'Animal creado correctamente.');
    }

    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        $speciesOptions = Animal::SPECIES;
        return view('animals.edit', compact('animal', 'speciesOptions'));
    }

    public function update(UpdateAnimalRequest $request, Animal $animal)
    {
        $animal->update($request->validated());

        return redirect()
            ->route('animals.index')
            ->with('success', 'Animal actualizado correctamente.');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()
            ->route('animals.index')
            ->with('success', 'Animal eliminado correctamente.');
    }
}
