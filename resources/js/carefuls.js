/**
 * Foods module - Maneja operaciones CRUD para alimentos
 */
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import $ from 'jquery';

window.toggleForm = function () {
    const form = document.getElementById('carefulsFormContainer');
    const carefulsForm = document.getElementById('carefuls-form');

    if (carefulsForm) {
        carefulsForm.reset();
        const storeRoute = carefulsForm.getAttribute('data-store-route');
        carefulsForm.setAttribute('action', storeRoute);

        document.getElementById('form-method').value = 'POST';
        document.getElementById('id_careful').value = '';

        // Limpiar mensajes de error anteriores
        const errorMessages = carefulsForm.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = carefulsForm.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const submitButton = document.querySelector('#carefulsFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Guardar';
        }
    }

    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
};

window.cancelForm = function () {
    const form = document.getElementById('carefulsFormContainer');
    if (form) {
        form.style.display = 'none';
    }
};

window.editAnimals = function (id_careful, date_start, hours, treatment, amount_food, fk_food, fk_employee, fk_animal) {
    const formContainer = document.getElementById('carefulsFormContainer');
    const form = document.getElementById('carefuls-form');

    if (formContainer && form) {
        formContainer.style.display = 'block';

        // Limpiar mensajes de error anteriores
        const errorMessages = form.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = form.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const updateUrlBase = form.getAttribute('data-update-route');
        form.setAttribute('action', updateUrlBase.replace(':id', id_careful));
        document.getElementById('form-method').value = 'PUT';

        document.getElementById('id_careful').value = id_careful;
        document.getElementById('date_start').value = date_start;
        document.getElementById('hours').value = hours;
        document.getElementById('treatment').value = treatment;
        document.getElementById('amount_food').value = amount_food;

        
        const foodsSelect = document.getElementById('fk_food');
        if (foodsSelect) {
            
            if (fk_food === null || fk_food === '') {
                foodsSelect.value = '';
            } else {
                foodsSelect.value = fk_food;
            }
            
            if (fk_food && !Array.from(foodsSelect.options).some(option => option.value === fk_food.toString())) {
                toastr.warning('La comida seleccionada anteriormente ya no está disponible.');
                foodsSelect.value = '';
            }
        }

        const employeesSelect = document.getElementById('fk_employee');
        if (employeesSelect) {
            
            if (fk_employee === null || fk_employee === '') {
                employeesSelect.value = '';
            } else {
                employeesSelect.value = fk_employee;
            }
            
            if (fk_employee && !Array.from(employeesSelect.options).some(option => option.value === fk_employee.toString())) {
                toastr.warning('El empleado seleccionado anteriormente ya no está disponible.');
                employeesSelect.value = '';
            }
        }

        const animalsSelect = document.getElementById('fk_animal');
        if (animalsSelect) {
            
            if (fk_animal === null || fk_animal === '') {
                animalsSelect.value = '';
            } else {
                animalsSelect.value = fk_animal;
            }
            
            if (fk_animal && !Array.from(animalsSelect.options).some(option => option.value === fk_animal.toString())) {
                toastr.warning('El animal seleccionado anteriormente ya no está disponible.');
                animalsSelect.value = '';
            }
        }

        const submitButton = document.querySelector('#carefulsFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Actualizar';
        }

        formContainer.scrollIntoView({ behavior: 'smooth' });
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('carefuls-form');

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
            
            // Validar campos requeridos
            const requiredFields = [
                { id: 'date_start', message: 'La fecha de inicio es requerida' },
                { id: 'hours', message: 'Las horas son requeridas' },
                { id: 'treatment', message: 'El tratamiento es requerido' },
                { id: 'fk_employee', message: 'Debe seleccionar un empleado' },
                { id: 'fk_animal', message: 'Debe seleccionar un animal' }
            ];

            requiredFields.forEach(field => {
                const element = document.getElementById(field.id);
                if (element && !element.value.trim()) {
                    // Buscar el contenedor de error
                    const errorContainer = element.parentNode.querySelector('.invalid-feedback');
                    if (errorContainer) {
                        errorContainer.textContent = field.message;
                    }
                    element.classList.add('is-invalid');
                    isValid = false;
                }
            });

            // NO validamos fk_food porque es opcional
            // Si amount_food tiene valor, entonces fk_food debería tener valor también (lógica opcional)
            const amountFood = document.getElementById('amount_food');
            const foodSelect = document.getElementById('fk_food');
            
            if (amountFood && amountFood.value.trim() && foodSelect && !foodSelect.value) {
                const errorContainer = foodSelect.parentNode.querySelector('.invalid-feedback');
                if (errorContainer) {
                    errorContainer.textContent = 'Si especifica cantidad de comida, debe seleccionar un alimento';
                }
                foodSelect.classList.add('is-invalid');
                isValid = false;
            }

            if (!isValid) {
                return; // Detener aquí si hay errores
            }

            // Resto del código de envío
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
                            toastr.success('Cuidado guardado exitosamente.');
                            window.location.reload();
                        } else {
                            if (data.errors) {
                                Object.keys(data.errors).forEach(key => {
                                    const inputElement = document.getElementById(key);
                                    const errorElement = inputElement?.parentNode?.querySelector('.invalid-feedback');
                                    
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
                            toastr.success('Cuidado guardado exitosamente.');
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

    const addButton = document.getElementById('add-carefuls-btn');
    if (addButton) {
        addButton.addEventListener('click', window.toggleForm);
    }

    const cancelButton = document.getElementById('cancel-form-btn');
    if (cancelButton) {
        cancelButton.addEventListener('click', window.cancelForm);
    }

    const editButtons = document.querySelectorAll('.edit-carefuls-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id_careful = this.getAttribute('data-id_careful');
            const date_start = this.getAttribute('data-date_start');
            const hours = this.getAttribute('data-hours');
            const treatment = this.getAttribute('data-treatment');
            const amount_food = this.getAttribute('data-amount_food');
            const fk_food = this.getAttribute('data-fk_food');
            const fk_employee = this.getAttribute('data-fk_employee');
            const fk_animal = this.getAttribute('data-fk_animal');
            
            window.editAnimals(id_careful, date_start, hours, treatment, amount_food, fk_food, fk_employee, fk_animal);
        });
    });

    // Búsqueda en vivo
    const searchInput = document.getElementById('search-input');
    const tableBody = document.getElementById('carefuls-table-body');

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

    // Manejo de eliminación con confirmación
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