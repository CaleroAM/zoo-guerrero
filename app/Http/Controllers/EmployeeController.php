<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $employees = Employee::paginate();

        return view('employees.index', compact('employees'))
            ->with('i', ($request->input('page', 1) - 1) * $employees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $employees = new Employee();

        return view('employees.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        Employee::create($request->validated());

        return Redirect::route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $employees = Employee::find($id);

        return view('employees.show', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $employees = Employee::find($id);

        return view('employees.edit', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employees): RedirectResponse
    {
        $employees->update($request->validated());

        return Redirect::route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Employee::find($id)->delete();

        return Redirect::route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
}
