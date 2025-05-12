<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            
            <input type="hidden" name="id_food" class="form-control" value="{{ old('id_food', $food?->id_food) }}" id="id_food" placeholder="Id Food">
            {!! $errors->first('id_food', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $food?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="content" class="form-label">{{ __('Contenido') }}</label>
            <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content', $food?->content) }}" id="content" placeholder="Content">
            {!! $errors->first('content', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_amount" class="form-label">{{ __('Contenido total') }}</label>
            <input type="number" name="total_amount" class="form-control @error('total_amount') is-invalid @enderror" value="{{ old('total_amount', $food?->total_amount) }}" id="total_amount" placeholder="Total Amount">
            {!! $errors->first('total_amount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cost" class="form-label">{{ __('Costo') }}</label>
            <input type="number" name="cost" class="form-control @error('cost') is-invalid @enderror" value="{{ old('cost', $food?->cost) }}" id="cost" placeholder="Cost">
            {!! $errors->first('cost', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_supplier">Seleccionar proveedor:</label>
            <select name="fk_supplier" id="fk_supplier" class="form-select">
                <option value="">-- Selecciona un proveedor --</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->rfc }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('fk_supplier', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    </div>
</div>