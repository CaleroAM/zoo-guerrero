<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Species;
use App\Models\Zone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnimalRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $animals = Animal::paginate();
        $species = Species::all();
        $zones = Zone::all();

        return view('animals.index', compact('animals', 'species', 'zones'))
            ->with('i', ($request->input('page', 1) - 1) * $animals->perPage())
            ->with('animal', null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $animal = new Animal();

        return view('animals.create', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalRequest $request): RedirectResponse
    {
        Animal::create($request->validated());

        return Redirect::route('animals.index')
            ->with('success', 'Animal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $animal = Animal::find($id);
        $species = Species::all();

        return view('animals.show', compact('animal', 'species'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $animal = Animal::find($id);

        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalRequest $request, Animal $animal): RedirectResponse
    {
        $animal->update($request->validated());

        return Redirect::route('animals.index')
            ->with('success', 'Animal updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Animal::find($id)->delete();

        return Redirect::route('animals.index')
            ->with('success', 'Animal deleted successfully');
    }
}
