<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_food" class="form-label">{{ __('Id Food') }}</label>
            <input type="text" name="id_food" class="form-control @error('id_food') is-invalid @enderror" value="{{ old('id_food', $foods?->id_food) }}" id="id_food" placeholder="Id Food">
            {!! $errors->first('id_food', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $foods?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="content" class="form-label">{{ __('Content') }}</label>
            <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content', $foods?->content) }}" id="content" placeholder="Content">
            {!! $errors->first('content', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_amount" class="form-label">{{ __('Total Amount') }}</label>
            <input type="text" name="total_amount" class="form-control @error('total_amount') is-invalid @enderror" value="{{ old('total_amount', $foods?->total_amount) }}" id="total_amount" placeholder="Total Amount">
            {!! $errors->first('total_amount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cost" class="form-label">{{ __('Cost') }}</label>
            <input type="text" name="cost" class="form-control @error('cost') is-invalid @enderror" value="{{ old('cost', $foods?->cost) }}" id="cost" placeholder="Cost">
            {!! $errors->first('cost', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_supplier" class="form-label">{{ __('Fk Supplier') }}</label>
            <input type="text" name="fk_supplier" class="form-control @error('fk_supplier') is-invalid @enderror" value="{{ old('fk_supplier', $foods?->fk_supplier) }}" id="fk_supplier" placeholder="Fk Supplier">
            {!! $errors->first('fk_supplier', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>