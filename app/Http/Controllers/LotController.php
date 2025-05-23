<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Food;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LotRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $lots = Lot::paginate();
        $foods = Food::all();

        return view('lots.index', compact('lots', 'foods'))
            ->with('i', ($request->input('page', 1) - 1) * $lots->perPage())
            ->with('lot', null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $lot = new Lot();
        $foods = Food::all();
        return view('lots.create', compact('lot', 'foods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LotRequest $request): RedirectResponse
    {
        Lot::create($request->validated());

        return Redirect::route('lots.index')
            ->with('success', 'Lot created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $lot= Lot::find($id);

        return view('lots.show', compact('lot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $lot = Lot::find($id);
        $foods = Food::all();
        return view('lots.edit', compact('lot', 'foods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LotRequest $request, Lot $lot): RedirectResponse
    {
        $lot->update($request->validated());

        return Redirect::route('lots.index')
            ->with('success', 'Lot updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Lot::find($id)->delete();

        return Redirect::route('lots.index')
            ->with('success', 'Lot deleted successfully');
    }
}
