<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ShiftRequest;
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

        return view('shift.index', compact('shifts'))
            ->with('i', ($request->input('page', 1) - 1) * $shifts->perPage());
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
    public function store(ShiftRequest $request): RedirectResponse
    {
        Shift::create($request->validated());

        return Redirect::route('shifts.index')
            ->with('success', 'Shift created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $shift = Shift::find($id);

        return view('shift.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $shift = Shift::find($id);

        return view('shift.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShiftRequest $request, Shift $shift): RedirectResponse
    {
        $shift->update($request->validated());

        return Redirect::route('shifts.index')
            ->with('success', 'Shift updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Shift::find($id)->delete();

        return Redirect::route('shifts.index')
            ->with('success', 'Shift deleted successfully');
    }
}
