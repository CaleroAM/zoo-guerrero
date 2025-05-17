<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ZoneRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $zones = Zone::paginate();

        return view('zones.index', compact('zones'))
            ->with('i', ($request->input('page', 1) - 1) * $zones->perPage())
            ->with('zone', null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $zone = new Zone();

        return view('zones.create', compact('zone'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ZoneRequest $request): RedirectResponse |JsonResponse
    {
        $zones = Zone::create($request->validated());

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Zona creada exitosamente',
                'zones' => $zones
            ], 201);
        }

        return Redirect::route('zones.index')
            ->with('success', 'Zona creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $zone = Zone::find($id);

        return view('zones.show', compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $zone = Zone::find($id);
        
        return view('zones.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ZoneRequest $request, $id): RedirectResponse | JsonResponse
    {
        $zone = Zone::find($id);
        $zone->update($request->validated());

        return Redirect::route('zones.index')
            ->with('success', 'Zona actualizada exitosamente');
    }

    public function destroy($id): RedirectResponse | JsonResponse
    {
        $zones = Zone::find($id);
        $zones->delete();

        return Redirect::route('zones.index')
            ->with('success', 'Zona eliminada exitosamente');
    }
}
