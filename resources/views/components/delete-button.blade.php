<form method="POST" action="{{ $action }}" class="delete-form d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">
        {{ $slot ?: 'Eliminar' }}
        <i class="fa fa-trash"></i> Eliminar
    </button>
</form>
