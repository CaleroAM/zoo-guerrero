@extends('layouts.app')

@section('template_title')
    Species
    <link href="{{ asset('../css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card"> <!-- EDITAR -->
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">


                            <span id="card_title">
                                {{ __('Species') }}
                                <i class="fas fa-otter ms-1 system-icon"></i>
                            </span>
                            
                            
                             <div class="float-right">
                                <a href="{{ route('species.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    <div class="card-body " style="background-color: #ff0909;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Id Specie</th>
									<th >Name Scientific</th>
									<th >Name Common</th>
									<th >Family</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($species as $species)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $species->id_specie }}</td>
										<td >{{ $species->name_scientific }}</td>
										<td >{{ $species->name_common }}</td>
										<td >{{ $species->family }}</td>

                                        <td>
                                            <form action="{{ route('species.destroy', $species->id_specie) }}" method="POST" class="action-buttons">
                                                <a class="btn btn-sm btn-primary" href="{{ route('species.show', $species->id_specie) }}">
                                                    <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('species.edit', $species->id_specie) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">
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
            </div>
        </div>
    </div>
    
    @vite(['resources/css/custom.css'])

@endsection