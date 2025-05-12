<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ShiftRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $shifts = Shift::paginate();

        return view('shifts.index', compact('shifts'))
            ->with('i', ($request->input('page', 1) - 1) * $shifts->perPage())
            ->with('shift',null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $shift = new Shift();

        return view('shift.create', compact('shift'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShiftRequest $request): RedirectResponse |JsonResponse
    {
        $shifts = Shift::create($request->validated());

        if($request->expectsJson()){
            return response()->json([
                "message" => 'Turno creado exitosamente',
                "shifts" => $shifts
            ], 200);
        }
        return Redirect::route('shifts.index')
            ->with('success', 'Turno creada exitosament');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $shift = Shift::find($id);

        return view('shifts.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $shift = Shift::find($id);

        return view('shifts.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShiftRequest $request, $id): RedirectResponse|JsonResponse
    {   
        $shift = Shift::find($id);
        $shift->update($request->validated());

        return Redirect::route('shifts.index')
            ->with('success', 'Turno actualizada exitosamente');
    }

    public function destroy($id): RedirectResponse|JsonResponse
    {
        $shifts = Shift::find($id);
        $shifts->delete();

        return Redirect::route('shifts.index')
            ->with('success', 'Turno eliminado exitosamente');
    }
}
