<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SpeciesRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.------------
     */
    public function index(Request $request): View 
    {
        $species = Species::paginate();

        return view('species.index', compact('species'))
            ->with('i', ($request->input('page', 1) - 1) * $species->perPage())
            ->with('specie', null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $specie = new Species();

        return view('species.create', compact('specie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpeciesRequest $request): RedirectResponse | JsonResponse
    {
        $specie = Species::create($request->validated());

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Especie creada exitosamente',
                'species' => $specie
            ], 201);
        }

        return Redirect::route('species.index')
            ->with('success', 'Especie creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $species = Species::find($id);

        return view('species.show', compact('species'));
    }

    /**
     * Show the form for editing the specified resource.--------------
     */
    public function edit($id): View
    {
        $specie = Species::find($id);
        return view('species.edit', compact('specie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpeciesRequest $request, $id): RedirectResponse | JsonResponse
    {
            $specie = Species::findOrFail($id); // Lanza 404 automáticamente si no existe

            $specie->update($request->validated());

            return Redirect::route('species.index')
                ->with('success', 'Especie actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse | JsonResponse
    {
        $specie = Species::find($id);
        $specie->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Especie eliminada exitosamente'
            ]);
        }

        return Redirect::route('species.index')
            ->with('success', 'Especie eliminada exitosamente');
    }  

}