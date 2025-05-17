/**
 * Foods module - Maneja operaciones CRUD para alimentos
 */
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import $ from 'jquery';

window.toggleForm = function () {
    const form = document.getElementById('datesFormContainer');
    const datesForm = document.getElementById('dates-form');

    if (datesForm) {
        datesForm.reset();
        const storeRoute = datesForm.getAttribute('data-store-route');
        datesForm.setAttribute('action', storeRoute);

        document.getElementById('form-method').value = 'POST';
        document.getElementById('id_date').value = '';

        // Limpiar mensajes de error anteriores
        const errorMessages = datesForm.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = datesForm.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const submitButton = document.querySelector('#datesFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Guardar';
        }
    }

    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
};

window.cancelForm = function () {
    const form = document.getElementById('datesFormContainer');
    if (form) {
        form.style.display = 'none';
    }
};

window.editDates = function (id_date, fk_employee, phone, email, street, cologne, cp, state) {
    const formContainer = document.getElementById('datesFormContainer');
    const form = document.getElementById('dates-form');

    if (formContainer && form) {
        formContainer.style.display = 'block';

        // Limpiar mensajes de error anteriores
        const errorMessages = form.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = form.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const updateUrlBase = form.getAttribute('data-update-route');
        form.setAttribute('action', updateUrlBase.replace(':id', id_date));
        document.getElementById('form-method').value = 'PUT';

        document.getElementById('id_date').value = id_date;
        const employeesSelect = document.getElementById('fk_employee');
        if (employeesSelect) {
            
            if (fk_employee === null || fk_employee === '') {
                employeesSelect.value = '';
            } else {
                employeesSelect.value = fk_employee;
            }
            
            if (fk_employee && !Array.from(employeesSelect.options).some(option => option.value === fk_employee.toString())) {
                toastr.warning('El empleado seleccionado no es válido. Por favor, selecciona un empleado de la lista.');
                employeesSelect.value = '';
            }
        }
        document.getElementById('phone').value = phone;
        document.getElementById('email').value = email;
        document.getElementById('street').value = street;
        document.getElementById('cologne').value = cologne;
        document.getElementById('cp').value = cp;
        document.getElementById('state').value = state;
        
        

        const submitButton = document.querySelector('#datesFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Actualizar';
        }

        formContainer.scrollIntoView({ behavior: 'smooth' });
    }
};



document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('dates-form');

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
            const employeesSelect = document.getElementById('fk_employee');
            if (!employeesSelect.value) {
                document.getElementById('fk_employee').textContent = 'Debe seleccionar un trabajador';
                employeesSelect.classList.add('is-invalid');
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
                            toastr.success('Datos guardado exitosamente.');
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
                            toastr.success('Datos guardado exitosamente.');
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

    const addButton = document.getElementById('add-dates-btn');
    if (addButton) {
        addButton.addEventListener('click', window.toggleForm);
    }

    const cancelButton = document.getElementById('cancel-form-btn');
    if (cancelButton) {
        cancelButton.addEventListener('click', window.cancelForm);
    }

    const editButtons = document.querySelectorAll('.edit-dates-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id_date = this.getAttribute('data-id_date');
            const fk_employee = this.getAttribute('data-fk_employee');
            const phone = this.getAttribute('data-phone');
            const email = this.getAttribute('data-email');
            const street = this.getAttribute('data-street');
            const cologne = this.getAttribute('data-cologne');
            const cp = this.getAttribute('data-cp');
            const state = this.getAttribute('data-state');
            
            
            window.editDates(id_date, fk_employee, phone, email, street, cologne, cp, state);
        });
    });

    // Búsqueda en vivo
    const searchInput = document.getElementById('search-input');
    const tableBody = document.getElementById('dates-table-body');

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