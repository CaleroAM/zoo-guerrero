<?php

namespace App\Http\Controllers;

use App\Models\Careful;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CarefulRequest;
use App\Models\Animal;
use App\Models\Employee;
use App\Models\Food;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CarefulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $carefuls = Careful::paginate();
        $foods = Food::all();
        $employees = Employee::all();
        $animals = Animal::all();

        return view('carefuls.index', compact('carefuls', 'foods', 'employees', 'animals'))
            ->with('i', ($request->input('page', 1) - 1) * $carefuls->perPage())
            ->with('careful', null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $careful = new Careful();

        return view('carefuls.create', compact('careful'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarefulRequest $request): RedirectResponse
    {
        Careful::create($request->validated());

        return Redirect::route('carefuls.index')
            ->with('success', 'Careful created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $careful = Careful::find($id);

        return view('carefuls.show', compact('careful'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $careful = Careful::find($id);

        return view('carefuls.edit', compact('careful'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarefulRequest $request, Careful $careful): RedirectResponse
    {
        $careful->update($request->validated());

        return Redirect::route('carefuls.index')
            ->with('success', 'Careful updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Careful::find($id)->delete();

        return Redirect::route('carefuls.index')
            ->with('success', 'Careful deleted successfully');
    }
}
