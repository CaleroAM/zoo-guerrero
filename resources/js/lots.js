/**
 * Foods module - Maneja operaciones CRUD para alimentos
 */
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import $ from 'jquery';

window.toggleForm = function () {
    const form = document.getElementById('lotsFormContainer');
    const lotsForm = document.getElementById('lots-form');

    if (lotsForm) {
        lotsForm.reset();
        const storeRoute = lotsForm.getAttribute('data-store-route');
        lotsForm.setAttribute('action', storeRoute);

        document.getElementById('form-method').value = 'POST';
        document.getElementById('id_lot').value = '';

        // Limpiar mensajes de error anteriores
        const errorMessages = lotsForm.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = lotsForm.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const submitButton = document.querySelector('#lotsFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Guardar';
        }
    }

    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
};

window.cancelForm = function () {
    const form = document.getElementById('lotsFormContainer');
    if (form) {
        form.style.display = 'none';
    }
};

window.editFoods = function (id_lot, date_cad, portion, date_start, fk_food) {
    const formContainer = document.getElementById('lotsFormContainer');
    const form = document.getElementById('lots-form');

    if (formContainer && form) {
        formContainer.style.display = 'block';

        // Limpiar mensajes de error anteriores
        const errorMessages = form.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = form.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const updateUrlBase = form.getAttribute('data-update-route');
        form.setAttribute('action', updateUrlBase.replace(':id', id_lot));
        document.getElementById('form-method').value = 'PUT';

        document.getElementById('id_lot').value = id_lot;
        document.getElementById('date_cad').value = date_cad;
        document.getElementById('portion').value = portion;
        document.getElementById('date_start').value = date_start;
        
        const lotsSelect = document.getElementById('fk_food');
        if (lotsSelect) {
            
            if (fk_food === null || fk_food === '') {
                lotsSelect.value = '';
            } else {
                lotsSelect.value = fk_food;
            }
            
            if (fk_food && !Array.from(lotsSelect.options).some(option => option.value === fk_food.toString())) {
                toastr.warning('El alimento seleccionado anteriormente ya no está disponible.');
                lotsSelect.value = '';
            }
        }

        const submitButton = document.querySelector('#lotsFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Actualizar';
        }

        formContainer.scrollIntoView({ behavior: 'smooth' });
    }
};



document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('lots-form');

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Limpiar errores previos
            const errorMessages = form.querySelectorAll('.invalid-feedback');
            errorMessages.forEach(el => { el.textContent = ''; });
            const invalidInputs = form.querySelectorAll('.is-invalid');
            invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

            // Validación del lado del cliente
            let isValid = true;
            
            
            // Validar el proveedor
            const foodsSelect = document.getElementById('fk_food');
            if (!foodsSelect.value) {
                document.getElementById('fk_food').textContent = 'Debe seleccionar un alimento';
                foodsSelect.classList.add('is-invalid');
                isValid = false;
            }

            if (!isValid) {
                return;
            }

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
                            toastr.success('Lote guardado exitosamente.');
                            window.location.reload();
                        } else {
                            if (data.errors) {
                                Object.keys(data.errors).forEach(key => {
                                    const inputElement = document.getElementById(key);
                                    const errorElement = document.getElementById(`${key}-error`);
                                    
                                    if (inputElement && errorElement) {
                                        inputElement.classList.add('is-invalid');
                                        errorElement.textContent = data.errors[key].join('\n');
                                    }
                                    
                                    toastr.error(data.errors[key].join('\n'));
                                });
                            } else {
                                toastr.error(data.message || 'Error al guardar');
                            }
                        }
                    } else {
                        if (response.ok) {
                            toastr.success('Lote guardado exitosamente.');
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

    const addButton = document.getElementById('add-lots-btn');
    if (addButton) {
        addButton.addEventListener('click', window.toggleForm);
    }

    const cancelButton = document.getElementById('cancel-form-btn');
    if (cancelButton) {
        cancelButton.addEventListener('click', window.cancelForm);
    }

    const editButtons = document.querySelectorAll('.edit-lots-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id_lot = this.getAttribute('data-id_lot');
            const date_cad = this.getAttribute('data-date_cad');
            const portion = this.getAttribute('data-portion');
            const date_start = this.getAttribute('data-date_start');
            const fk_food = this.getAttribute('data-fk_food');
            
            window.editFoods(id_lot, date_cad, portion, date_start, fk_food);
        });
    });

    // Búsqueda en vivo
    const searchInput = document.getElementById('search-input');
    const tableBody = document.getElementById('lots-table-body');

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