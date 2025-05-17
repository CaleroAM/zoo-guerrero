<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="rfc" class="form-label">{{ __('RFC') }}</label>
            <input type="text" name="rfc" class="form-control @error('rfc') is-invalid @enderror" value="{{ old('rfc', $supplier?->rfc) }}" id="rfc" placeholder="RFC">
            {!! $errors->first('rfc', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $supplier?->name) }}" id="name" placeholder="Nombre">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Celular') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $supplier?->phone) }}" id="phone" placeholder="Celular">
            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mail" class="form-label">{{ __('Correo') }}</label>
            <input type="text" name="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ old('mail', $supplier?->mail) }}" id="mail" placeholder="Correo">
            {!! $errors->first('mail', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="addres" class="form-label">{{ __('Dirección') }}</label>
            <input type="text" name="addres" class="form-control @error('addres') is-invalid @enderror" value="{{ old('addres', $supplier?->addres) }}" id="addres" placeholder="Dirección">
            {!! $errors->first('addres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="type_sup" class="form-label">{{ __('Tipo de proveedor') }}</label>
            <input type="text" name="type_sup" class="form-control @error('type_sup') is-invalid @enderror" value="{{ old('type_sup', $supplier?->type_sup) }}" id="type_sup" placeholder="Tipo de proveedor">
            {!! $errors->first('type_sup', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
</div>