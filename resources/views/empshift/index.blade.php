@extends('layouts.app')

@section('template_title')
    Empshifts
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empshifts') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empshifts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Empshift</th>
									<th >Hours Worked</th>
									<th >Reason</th>
									<th >Fk Shift</th>
									<th >Fk Employee</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empshifts as $empshift)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $empshift->id_empshift }}</td>
										<td >{{ $empshift->hours_worked }}</td>
										<td >{{ $empshift->reason }}</td>
										<td >{{ $empshift->fk_shift }}</td>
										<td >{{ $empshift->fk_employee }}</td>

                                            <td>
                                                <form action="{{ route('empshifts.destroy', $empshift->id_empshift) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empshifts.show', $empshift->id_empshift) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empshifts.edit', $empshift->id_empshift) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $empshifts->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
