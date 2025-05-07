@extends('layouts.app')

@section('template_title')
    Employees
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Employees') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Id Employee</th>
									<th >Name</th>
									<th >Second Name</th>
									<th >Last Name</th>
									<th >Age</th>
									<th >Sex</th>
									<th >Type Empl</th>
									<th >Id Boss</th>
									<th >Fk Shift</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $employee->id_employee }}</td>
										<td >{{ $employee->name }}</td>
										<td >{{ $employee->second_name }}</td>
										<td >{{ $employee->last_name }}</td>
										<td >{{ $employee->age }}</td>
										<td >{{ $employee->Sex }}</td>
										<td >{{ $employee->type_empl }}</td>
										<td >{{ $employee->id_boss }}</td>
										<td >{{ $employee->fk_shift }}</td>

                                            <td>
                                                <form action="{{ route('employees.destroy', $employees->id_employee) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('employees.show', $employees->id_employee) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('employees.edit', $employees->id_employee) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
