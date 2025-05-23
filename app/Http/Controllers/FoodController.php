<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FoodRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $foods = Food::paginate(); 
        $suppliers = Supplier::all();

        return view('foods.index',compact('foods', 'suppliers'))
            ->with('i', ($request->input('page', 1) - 1) * $foods->perPage())
            ->with('food', null);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $foods = new Food();
        $suppliers = Supplier::all();
        return view('foods.create', compact('foods', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request): RedirectResponse
    {
        Food::create($request->validated());

        return Redirect::route('foods.index')
            ->with('success', 'Food created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $foods = Food::find($id);

        return view('foods.show', compact('foods'));
    }

    /**
     * Show the form for editing the specified resource.---------------
     */
    public function edit($id): View
    {
        $food = Food::find($id);
        $suppliers = Supplier::all();
        return view('foods.edit', compact('food', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, $id): RedirectResponse
{
    $food = Food::findOrFail($id); 

    $food->update($request->validated());

    return Redirect::route('foods.index')
        ->with('success', 'Food updated successfully');
}


    public function destroy($id): RedirectResponse
    {
        Food::find($id)->delete();

        return Redirect::route('foods.index')
            ->with('success', 'Food deleted successfully');
    }
}
