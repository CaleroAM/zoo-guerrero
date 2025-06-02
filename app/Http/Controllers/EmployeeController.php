<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Shift;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $employees = Employee::paginate();
        $bosses = Employee::all();
        $shifts = Shift::all();

        return view('employees.index', compact('employees','bosses', 'shifts'))
            ->with('i', ($request->input('page', 1) - 1) * $employees->perPage())
            ->with('employee', null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $employees = new Employee();
        $boss = Employee::all();
        $shifts = Shift::all();
        return view('employees.create', compact('employees', 'boss', 'shifts'));
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
        $employee = Employee::find($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $employee = Employee::find($id);
        $bosses = Employee::all();
        $shifts = Shift::all();
        $date = $employee->date ?? new \App\Models\Date();
        return view('employees.edit', compact('employee', 'bosses', 'shifts', 'date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->validated());

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
