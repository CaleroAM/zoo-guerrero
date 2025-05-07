
@extends('layouts.app')

@section('template_title')
    Animals
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Animals') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('animals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                    
                    <div class="card-body p-4">
                        <form action="{{ route('animals.index') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Buscar animales..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-success mx-2" type="submit">Buscar</button>
                                    @if(request()->has('search') && !empty(request('search')))
                                        <a href="{{ route('animals.index') }}" class="btn btn-secondary">Ver todos</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Id Animal</th>
									<th >Name</th>
									<th >Age</th>
									<th >Height</th>
									<th >Weigh</th>
									<th >Sex</th>
									<th >Fecha Nac</th>
									<th >Descripcion</th>
									<th >Fk Specie</th>
									<th >Fk Zone</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($animals as $animal)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $animal->id_animal }}</td>
										<td >{{ $animal->name }}</td>
										<td >{{ $animal->age }}</td>
										<td >{{ $animal->height }}</td>
										<td >{{ $animal->weigh }}</td>
										<td >{{ $animal->sex }}</td>
										<td >{{ $animal->fecha_nac }}</td>
										<td >{{ $animal->descripcion }}</td>
										<td >{{ $animal->fk_specie }}</td>
										<td >{{ $animal->fk_zone }}</td>

                                            <td>
                                                <form action="{{ route('animals.destroy', $animal->id_animal) }}" method="POST" class="action-buttons">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('animals.show', $animal->id_animal) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('animals.edit', $animal->id_animal) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $animals->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection