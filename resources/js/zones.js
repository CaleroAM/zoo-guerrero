/**
 * Zones module - Maneja operaciones CRUD para zonas
 */
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import $ from 'jquery';

window.toggleForm = function () {
    const form = document.getElementById('zonesFormContainer');
    const zonesForm = document.getElementById('zones-form');

    if (zonesForm) {
        zonesForm.reset();
        const storeRoute = zonesForm.getAttribute('data-store-route');
        zonesForm.setAttribute('action', storeRoute);

        document.getElementById('form-method').value = 'POST';
        document.getElementById('id_zone').value = '';

        const submitButton = document.querySelector('#zonesFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Guardar';
        }
    }

    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
};

window.cancelForm = function () {
    const form = document.getElementById('zonesFormContainer');
    if (form) {
        form.style.display = 'none';
    }
};

window.editZones = function (id, name, location, capacity, type, weather) {
    const formContainer = document.getElementById('zonesFormContainer');
    const form = document.getElementById('zones-form');

    if (formContainer && form) {
        formContainer.style.display = 'block';

        const updateUrlBase = form.getAttribute('data-update-route');
        form.setAttribute('action', updateUrlBase.replace(':id', id));
        document.getElementById('form-method').value = 'PUT';

        document.getElementById('id_zone').value = id;
        document.getElementById('name').value = name;
        document.getElementById('location').value = location;
        document.getElementById('capacity').value = capacity;
        document.getElementById('type').value = type;
        document.getElementById('weather').value = weather;

        const submitButton = document.querySelector('#zonesFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Actualizar';
        }

        formContainer.scrollIntoView({ behavior: 'smooth' });
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('zones-form');

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
                            toastr.success('Zona guardada exitosamente.');
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
                            toastr.success('Zona guardada exitosamente.');
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

    const addButton = document.getElementById('add-zones-btn');
    if (addButton) {
        addButton.addEventListener('click', window.toggleForm);
    }

    const cancelButton = document.getElementById('cancel-form-btn');
    if (cancelButton) {
        cancelButton.addEventListener('click', window.cancelForm);
    }

    const editButtons = document.querySelectorAll('.edit-zones-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const location = this.getAttribute('data-location');
            const capacity = this.getAttribute('data-capacity');
            const type = this.getAttribute('data-type');
            const weather = this.getAttribute('data-weather');
            window.editZones(id, name, location, capacity, type, weather);
        });
    });

    // Búsqueda en vivo
    const searchInput = document.getElementById('search-input');
    const tableBody = document.getElementById('zones-table-body');

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
});