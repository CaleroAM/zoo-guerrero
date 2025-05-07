<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ZoneRequest;
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

        return view('zone.index', compact('zones'))
            ->with('i', ($request->input('page', 1) - 1) * $zones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $zone = new Zone();

        return view('zone.create', compact('zone'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ZoneRequest $request): RedirectResponse
    {
        Zone::create($request->validated());

        return Redirect::route('zones.index')
            ->with('success', 'Zone created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $zone = Zone::find($id);

        return view('zone.show', compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $zone = Zone::find($id);

        return view('zone.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ZoneRequest $request, Zone $zone): RedirectResponse
    {
        $zone->update($request->validated());

        return Redirect::route('zones.index')
            ->with('success', 'Zone updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Zone::find($id)->delete();

        return Redirect::route('zones.index')
            ->with('success', 'Zone deleted successfully');
    }
}
