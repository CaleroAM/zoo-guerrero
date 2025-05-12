/**
 * Foods module - Maneja operaciones CRUD para alimentos
 */
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import $ from 'jquery';

window.toggleForm = function () {
    const form = document.getElementById('foodsFormContainer');
    const foodsForm = document.getElementById('foods-form');

    if (foodsForm) {
        foodsForm.reset();
        const storeRoute = foodsForm.getAttribute('data-store-route');
        foodsForm.setAttribute('action', storeRoute);

        document.getElementById('form-method').value = 'POST';
        document.getElementById('id_food').value = '';

        // Limpiar mensajes de error anteriores
        const errorMessages = foodsForm.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = foodsForm.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const submitButton = document.querySelector('#foodsFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Guardar';
        }
    }

    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
};

window.cancelForm = function () {
    const form = document.getElementById('foodsFormContainer');
    if (form) {
        form.style.display = 'none';
    }
};

window.editFoods = function (id_food, name, content, total_amount, cost, fk_supplier) {
    const formContainer = document.getElementById('foodsFormContainer');
    const form = document.getElementById('foods-form');

    if (formContainer && form) {
        formContainer.style.display = 'block';

        // Limpiar mensajes de error anteriores
        const errorMessages = form.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = form.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const updateUrlBase = form.getAttribute('data-update-route');
        form.setAttribute('action', updateUrlBase.replace(':id', id_food));
        document.getElementById('form-method').value = 'PUT';

        document.getElementById('id_food').value = id_food;
        document.getElementById('name').value = name;
        document.getElementById('content').value = content;
        document.getElementById('total_amount').value = total_amount;
        document.getElementById('cost').value = cost;
        
        // Asegurarse de que se seleccione el proveedor correcto
        const supplierSelect = document.getElementById('fk_supplier');
        if (supplierSelect) {
            // Si fk_supplier es null, seleccionar la opción predeterminada
            if (fk_supplier === null || fk_supplier === '') {
                supplierSelect.value = '';
            } else {
                supplierSelect.value = fk_supplier;
            }
            
            // Si no existe la opción, añadir mensaje de advertencia
            if (fk_supplier && !Array.from(supplierSelect.options).some(option => option.value === fk_supplier.toString())) {
                toastr.warning('El proveedor seleccionado anteriormente ya no está disponible.');
                supplierSelect.value = '';
            }
        }

        const submitButton = document.querySelector('#foodsFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Actualizar';
        }

        formContainer.scrollIntoView({ behavior: 'smooth' });
    }
};



document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('foods-form');

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
            
            // Validar que el nombre no esté vacío
            const nameInput = document.getElementById('name');
            if (!nameInput.value.trim()) {
                document.getElementById('name-error').textContent = 'El nombre es obligatorio';
                nameInput.classList.add('is-invalid');
                isValid = false;
            }
            
            // Validar el proveedor
            const supplierSelect = document.getElementById('fk_supplier');
            if (!supplierSelect.value) {
                document.getElementById('fk_supplier-error').textContent = 'Debe seleccionar un proveedor';
                supplierSelect.classList.add('is-invalid');
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
                            toastr.success('Alimento guardado exitosamente.');
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
                            toastr.success('Alimento guardado exitosamente.');
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

    const addButton = document.getElementById('add-foods-btn');
    if (addButton) {
        addButton.addEventListener('click', window.toggleForm);
    }

    const cancelButton = document.getElementById('cancel-form-btn');
    if (cancelButton) {
        cancelButton.addEventListener('click', window.cancelForm);
    }

    const editButtons = document.querySelectorAll('.edit-foods-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id_food = this.getAttribute('data-id_food');
            const name = this.getAttribute('data-name');
            const content = this.getAttribute('data-content');
            const total_amount = this.getAttribute('data-total_amount');
            const cost = this.getAttribute('data-cost');
            const fk_supplier = this.getAttribute('data-fk_supplier');
            
            window.editFoods(id_food, name, content, total_amount, cost, fk_supplier);
        });
    });

    // Búsqueda en vivo
    const searchInput = document.getElementById('search-input');
    const tableBody = document.getElementById('foods-table-body');

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