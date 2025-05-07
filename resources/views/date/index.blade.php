@extends('layouts.app')

@section('template_title')
    Dates
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dates') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('dates.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Date</th>
									<th >Fk Employee</th>
									<th >Phone</th>
									<th >Email</th>
									<th >Street</th>
									<th >Cologne</th>
									<th >Cp</th>
									<th >State</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dates as $date)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $date->id_date }}</td>
										<td >{{ $date->fk_employee }}</td>
										<td >{{ $date->phone }}</td>
										<td >{{ $date->email }}</td>
										<td >{{ $date->street }}</td>
										<td >{{ $date->cologne }}</td>
										<td >{{ $date->cp }}</td>
										<td >{{ $date->state }}</td>

                                            <td>
                                                <form action="{{ route('dates.destroy', $date->id_date) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dates.show', $date->id_date) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('dates.edit', $date->id_date) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $dates->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
