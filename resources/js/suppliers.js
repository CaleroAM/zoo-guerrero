/**
 * Zones module - Maneja operaciones CRUD para zonas
 */
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import $ from 'jquery';

window.toggleForm = function () {
    const form = document.getElementById('suppliersFormContainer');
    const suppliersForm = document.getElementById('suppliers-form');

    if (suppliersForm) {
        suppliersForm.reset();
        const storeRoute = suppliersForm.getAttribute('data-store-route');
        suppliersForm.setAttribute('action', storeRoute);

        document.getElementById('form-method').value = 'POST';
        document.getElementById('rfc').value = '';

        const submitButton = document.querySelector('#suppliersFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Guardar';
        }
    }

    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
};

window.cancelForm = function () {
    const form = document.getElementById('suppliersFormContainer');
    if (form) {
        form.style.display = 'none';
    }
};

window.editSuppliers = function (rfc, name, phone, mail, addres, type_sup) {
    const formContainer = document.getElementById('suppliersFormContainer');
    const form = document.getElementById('suppliers-form');

    if (formContainer && form) {
        formContainer.style.display = 'block';

        const updateUrlBase = form.getAttribute('data-update-route');
        form.setAttribute('action', updateUrlBase.replace(':id', rfc));
        document.getElementById('form-method').value = 'PUT';

        document.getElementById('rfc').value = rfc;
        document.getElementById('name').value = name;
        document.getElementById('phone').value = phone;
        document.getElementById('mail').value = mail;
        document.getElementById('addres').value = addres;
        document.getElementById('type_sup').value = type_sup;

        const submitButton = document.querySelector('#suppliersFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Actualizar';
        }

        formContainer.scrollIntoView({ behavior: 'smooth' });
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('suppliers-form');

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            const url = form.getAttribute('action');
            const method = document.getElementById('form-method').value;
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            try {
                const headers = {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                };

                if (method === 'PUT' || method === 'PATCH') {
                    formData.append('_method', method);
                }

                const response = await fetch(url, {
                    method: method === 'PUT' || method === 'PATCH' ? 'POST' : method,
                    headers: headers,
                    body: formData,
                });

                try {
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        const data = await response.json();
                        
                        if (response.ok) {
                            toastr.success('Proveedor guardada exitosamente.');
                            window.location.reload();
                        } else {
                            if (data.errors) {
                                Object.keys(data.errors).forEach(key => {
                                    toastr.error(data.errors[key].join('\n'));
                                });
                            } else {
                                toastr.error(data.message || 'Error al guardar');
                            }
                        }
                    } else {
                        if (response.ok) {
                            toastr.success('Proveedor guardada exitosamente.');
                            window.location.reload();
                        } else {
                            toastr.error(`Error: ${response.status} ${response.statusText}`);
                            console.error('Respuesta no JSON:', await response.text());
                        }
                    }
                } catch (parseError) {
                    console.error('Error al parsear la respuesta:', parseError);
                    toastr.error('Error en el formato de respuesta del servidor.');
                }
            } catch (err) {
                console.error('Error en la solicitud:', err);
                toastr.error('Ocurrió un error al procesar la solicitud.');
            }
        });
    }

    const addButton = document.getElementById('add-suppliers-btn');
    if (addButton) {
        addButton.addEventListener('click', window.toggleForm);
    }

    const cancelButton = document.getElementById('cancel-form-btn');
    if (cancelButton) {
        cancelButton.addEventListener('click', window.cancelForm);
    }

    const editButtons = document.querySelectorAll('.edit-suppliers-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const rfc = this.getAttribute('data-rfc');
            const name = this.getAttribute('data-name');
            const phone = this.getAttribute('data-phone');
            const mail = this.getAttribute('data-mail');
            const addres = this.getAttribute('data-addres');
            const type_sup = this.getAttribute('data-type_sup');
            window.editSuppliers(rfc, name, phone, mail, addres, type_sup);
        });
    });

    // Búsqueda en vivo
    const searchInput = document.getElementById('search-input');
    const tableBody = document.getElementById('suppliers-table-body');

    if (searchInput && tableBody) {
        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.toLowerCase();
            const rows = tableBody.querySelectorAll('tr');
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
                row.style.display = rowText.includes(searchTerm) ? '' : 'none';
            });
        });
    }
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
    
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Evita el envío inmediato
    
                if (confirm('¿Estás seguro de que deseas eliminar este elemento? Esta acción no se puede deshacer.')) {
                    form.submit(); // Envía el formulario si el usuario confirma
                }
            });
        });
    });
    
});