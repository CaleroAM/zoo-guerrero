<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DateRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $dates = Date::paginate();
        $employees = Employee::all();
        return view('dates.index', compact('dates', 'employees'))
            ->with('i', ($request->input('page', 1) - 1) * $dates->perPage())
            ->with('date', null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $date = new Date();

        return view('dates.create', compact('date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DateRequest $request): RedirectResponse
    {
        Date::create($request->validated());

        return Redirect::route('dates.index')
            ->with('success', 'Date created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $date = Date::find($id);

        return view('dates.show', compact('date'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $date = Date::find($id);

        return view('dates.edit', compact('date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DateRequest $request, Date $date): RedirectResponse
    {
        $date->update($request->validated());

        return Redirect::route('dates.index')
            ->with('success', 'Date updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Date::find($id)->delete();

        return Redirect::route('dates.index')
            ->with('success', 'Date deleted successfully');
    }
}
