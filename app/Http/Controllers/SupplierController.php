<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Database\QueryException;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $suppliers = Supplier::paginate();

        return view('suppliers.index', compact('suppliers'))
            ->with('i', ($request->input('page', 1) - 1) * $suppliers->perPage())
            ->with('supplier', null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $supplier = new Supplier();

        return view('suppliers.create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request): RedirectResponse
    {
        Supplier::create($request->validated());

        return Redirect::route('suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $supplier = Supplier::find($id);

        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $supplier = Supplier::find($id);

        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, Supplier $supplier): RedirectResponse | JsonResponse
    {
        try {
            // Verificar si el RFC ha cambiado
            if ($supplier->rfc !== $request->input('rfc')) {
                // Si ha cambiado, devolver un error
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'No se puede modificar el RFC de un proveedor registrado.'
                    ], 422);
                }
                
                return Redirect::back()
                    ->withInput()
                    ->with('error', 'No se puede modificar el RFC de un proveedor registrado.');
            }
            
            $supplier->update($request->validated());

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Proveedor actualizado exitosamente'
                ]);
            }

            return Redirect::route('suppliers.index')
                ->with('success', 'Proveedor actualizado exitosamente');
                
        } catch (QueryException $e) {
            // En caso de cualquier otro error de base de datos
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'No se puede actualizar el proveedor. Verifica los datos e intenta de nuevo.'
                ], 422);
            }
            
            return Redirect::back()
                ->withInput()
                ->with('error', 'No se puede actualizar el proveedor. Verifica los datos e intenta de nuevo.');
        }
    }

    public function destroy($id): RedirectResponse | JsonResponse
    {
        try {
            $suppliers = Supplier::find($id);
            $suppliers->delete();
            
            return Redirect::route('suppliers.index')
                ->with('success', 'Proveedor eliminado exitosamente');
                
        } catch (QueryException $e) {
            return Redirect::route('suppliers.index')
                ->with('error', 'No se puede eliminar el proveedor porque tiene registros relacionados.');
        }
    }
}