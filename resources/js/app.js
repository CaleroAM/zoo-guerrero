import './bootstrap';
import Swal from 'sweetalert2';
import Toastify from 'toastify-js';
import './components/notifications';
import $ from 'jquery';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

// Haz toastr global si lo necesitas en otros archivos
window.toastr = toastr;
window.$ = $;
window.Swal = Swal;

document.addEventListener('submit', function (e) {
    const form = e.target;
    
    // Aplica a cualquier formulario con clase delete-form
    if (form.matches('.delete-form')) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = form.getAttribute('action');
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                if (!token || !url) {
                    toastr.error('No se pudo obtener la información del formulario.');
                    return;
                }

                // Verifica si el formulario está dentro de una fila de tabla (para eliminar en frontend)
                const tableRow = form.closest('tr');
                const isAjax = !!tableRow; // Si está en tabla, eliminar con AJAX; si no, usar submit tradicional

                if (isAjax) {
                    try {
                        const formData = new FormData();
                        formData.append('_method', 'DELETE');
                        formData.append('_token', token);

                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': token,
                                'Accept': 'application/json',
                            },
                            body: formData,
                        });

                        if (response.ok) {
                            tableRow.remove();
                            toastr.success('Elemento eliminado correctamente');
                        } else {
                            const errorText = await response.text();
                            console.error('Error al eliminar:', errorText);
                            toastr.error('No se pudo eliminar el elemento');
                        }
                    } catch (error) {
                        console.error('Error de red:', error);
                        toastr.error('Error en la solicitud');
                    }
                } else {
                    // Si no es tabla, usa comportamiento tradicional (formulario normal)
                    form.submit();
                }
            }
        });
    }
});


