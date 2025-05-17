<?php

namespace App\Http\Controllers;

use App\Models\Empshift;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmpshiftRequest;
use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmpshiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $empshifts = Empshift::paginate();
        $shifts = Shift::all();
        $employees = Employee::all();

        return view('empshifts.index', compact('empshifts', 'shifts', 'employees'))
            ->with('i', ($request->input('page', 1) - 1) * $empshifts->perPage())
            ->with('empshift', null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $empshift = new Empshift();
        
        return view('empshifts.create', compact('empshift'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpshiftRequest $request): RedirectResponse
    {
        Empshift::create($request->validated());

        return Redirect::route('empshifts.index')
            ->with('success', 'Empshift created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $empshift = Empshift::find($id);

        return view('empshifts.show', compact('empshift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $empshift = Empshift::find($id);
        return view('empshifts.edit', compact('empshift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpshiftRequest $request, Empshift $empshift): RedirectResponse
    {
        $empshift->update($request->validated());

        return Redirect::route('empshifts.index')
            ->with('success', 'Empshift updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Empshift::find($id)->delete();

        return Redirect::route('empshifts.index')
            ->with('success', 'Empshift deleted successfully');
    }
}
