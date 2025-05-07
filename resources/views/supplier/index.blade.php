@extends('layouts.app')

@section('template_title')
    Suppliers
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Suppliers') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Rfc</th>
									<th >Name</th>
									<th >Phone</th>
									<th >Mail</th>
									<th >Addres</th>
									<th >Type Sup</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $supplier->rfc }}</td>
										<td >{{ $supplier->name }}</td>
										<td >{{ $supplier->phone }}</td>
										<td >{{ $supplier->mail }}</td>
										<td >{{ $supplier->addres }}</td>
										<td >{{ $supplier->type_sup }}</td>

                                            <td>
                                                <form action="{{ route('suppliers.destroy', $supplier->id_supplier) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('suppliers.show', $supplier->id_supplier) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('suppliers.edit', $supplier->id_supplier) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $suppliers->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
