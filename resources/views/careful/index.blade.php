@extends('layouts.app')

@section('template_title')
    Carefuls
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Carefuls') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('carefuls.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Careful</th>
									<th >Date Start</th>
									<th >Hours</th>
									<th >Treatment</th>
									<th >Amount Food</th>
									<th >Fk Food</th>
									<th >Fk Employee</th>
									<th >Fk Animal</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carefuls as $careful)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $careful->id_careful }}</td>
										<td >{{ $careful->date_start }}</td>
										<td >{{ $careful->hours }}</td>
										<td >{{ $careful->treatment }}</td>
										<td >{{ $careful->amount_food }}</td>
										<td >{{ $careful->fk_food }}</td>
										<td >{{ $careful->fk_employee }}</td>
										<td >{{ $careful->fk_animal }}</td>

                                            <td>
                                                <form action="{{ route('carefuls.destroy', $careful->id_careful) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('carefuls.show', $careful->id_careful) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('carefuls.edit', $careful->id_careful) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $carefuls->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
