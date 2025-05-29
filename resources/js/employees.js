import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import $ from 'jquery';

window.toggleForm = function () {
    const form = document.getElementById('employeesFormContainer');
    const employeesForm = document.getElementById('employees-form');

    if (employeesForm) {
        employeesForm.reset();
        const storeRoute = employeesForm.getAttribute('data-store-route');
        employeesForm.setAttribute('action', storeRoute);

        document.getElementById('form-method').value = 'POST';
        document.getElementById('id_employee').value = '';

        const errorMessages = employeesForm.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = employeesForm.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const submitButton = document.querySelector('#employeesFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Guardar';
        }
        
        updateBossFieldVisibility();
    }

    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
};

window.cancelForm = function () {
    const form = document.getElementById('employeesFormContainer');
    if (form) {
        form.style.display = 'none';
    }
};

window.editEmployees = function (id_employee, name, second_name, last_name, second_last_name, age, Sex, type_empl, id_boss, fk_shift) {
    const formContainer = document.getElementById('employeesFormContainer');
    const form = document.getElementById('employees-form');

    if (formContainer && form) {
        formContainer.style.display = 'block';

        const errorMessages = form.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = form.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const updateUrlBase = form.getAttribute('data-update-route');
        form.setAttribute('action', updateUrlBase.replace(':id', id_employee));
        document.getElementById('form-method').value = 'PUT';

        document.getElementById('id_employee').value = id_employee;
        document.getElementById('name').value = name;
        document.getElementById('second_name').value = second_name;
        document.getElementById('last_name').value = last_name;
        document.getElementById('second_last_name').value = second_last_name;
        document.getElementById('age').value = age;

        // Establecer correctamente el valor del sexo (radio buttons)
        if (Sex === 'Masculino') {
            document.getElementById('sexo_m').checked = true;
        } else if (Sex === 'Femenino') {
            document.getElementById('sexo_f').checked = true;
        }
        
        document.getElementById('type_empl').value = type_empl;

        const bossSelect = document.getElementById('id_boss');
        if (bossSelect) {
            bossSelect.value = id_boss ?? '';
            if (id_boss && !Array.from(bossSelect.options).some(opt => opt.value === id_boss.toString())) {
                bossSelect.value = '';
            }
        }

        const shiftSelect = document.getElementById('fk_shift');
        if (shiftSelect) {
            shiftSelect.value = fk_shift ?? '';
            if (fk_shift && !Array.from(shiftSelect.options).some(opt => opt.value === fk_shift.toString())) {
                toastr.warning('El turno seleccionado anteriormente ya no está disponible.');
                shiftSelect.value = '';
            }
        }

        const submitButton = document.querySelector('#employeesFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Actualizar';
        }

        // Actualizar visibilidad del campo de jefe basado en el tipo de empleado
        updateBossFieldVisibility();

        formContainer.scrollIntoView({ behavior: 'smooth' });
    }
};

// Función para verificar si el tipo de empleado es un jefe
function isManagerType(type) {
    return type === 'Jefe de limpieza' || 
           type === 'Jefe de cuidadores' || 
           type === 'Jefe administrativo';
}

// Función para verificar si es un gerente general
function isGeneralManager(type) {
    return type === 'Gerente General';
}

// Función para actualizar la visibilidad y opciones del campo de jefe
function updateBossFieldVisibility() {
    const typeEmploy = document.getElementById('type_empl').value;
    const bossGroup = document.getElementById('employee-select-group'); // Corregido el ID aquí
    const bossSelect = document.getElementById('id_boss');
    const bossError = document.getElementById('id_boss-error');
    
    if (bossGroup && bossSelect) {
        // Si es gerente general, no mostrar opciones de jefe
        if (isGeneralManager(typeEmploy)) {
            bossGroup.style.display = 'none';
            if (bossError) bossError.textContent = '';
            bossSelect.classList.remove('is-invalid');
            return;
        }
        
        // Mostrar el campo para todos los demás tipos
        bossGroup.style.display = 'block';
        
        if (isManagerType(typeEmploy)) {
            // Si es un jefe, solo mostrar gerentes generales como opción
            Array.from(bossSelect.options).forEach(option => {
                if (option.value === '') return; // Mantener la opción predeterminada "Seleccionar jefe"
                
                // Obtener el texto completo de la opción
                const optionText = option.textContent;
                // Verificar si la opción contiene "Gerente General"
                const isGeneralManagerOption = optionText.includes('Gerente General');
                
                // Mostrar solo si es Gerente General
                option.style.display = isGeneralManagerOption ? '' : 'none';
            });
        } else {
            // Si es un empleado normal, mostrar todos los tipos de jefes
            Array.from(bossSelect.options).forEach(option => {
                if (option.value === '') return; // Mantener la opción predeterminada "Seleccionar jefe"
                
                // Obtener el texto completo de la opción
                const optionText = option.textContent;
                
                // Verificar si la opción es de algún tipo de jefe
                const isManagerOption = optionText.includes('Jefe de limpieza') || 
                                      optionText.includes('Jefe de cuidadores') || 
                                      optionText.includes('Jefe administrativo') ||
                                      optionText.includes('Gerente General');
                
                // Mostrar solo si es un jefe
                option.style.display = isManagerOption ? '' : 'none';
            });
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('employees-form');
    const typeEmploySelect = document.getElementById('type_empl');
    
    if (typeEmploySelect && !Array.from(typeEmploySelect.options).some(opt => opt.value === 'Gerente General')) {
        const generalManagerOption = document.createElement('option');
        generalManagerOption.value = 'Gerente General';
        generalManagerOption.textContent = 'Gerente General';
        typeEmploySelect.appendChild(generalManagerOption);
    }
    
    // Agregar listener para cambios en el tipo de empleado
    if (typeEmploySelect) {
        typeEmploySelect.addEventListener('change', updateBossFieldVisibility);
    }

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const errorMessages = form.querySelectorAll('.invalid-feedback');
            errorMessages.forEach(el => { el.textContent = ''; });
            const invalidInputs = form.querySelectorAll('.is-invalid');
            invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

            let isValid = true;
            
            // Obtener el valor del tipo de empleado
            const typeEmploy = document.getElementById('type_empl').value;
            const isGeneralManagerType = isGeneralManager(typeEmploy);

            // Verificación del jefe según el tipo de empleado
            const bossSelect = document.getElementById('id_boss');
            const bossError = document.getElementById('id_boss-error');
            
            if (bossSelect && bossError) {
                // Si no es gerente general, se requiere jefe
                if (!isGeneralManagerType && (!bossSelect.value || bossSelect.value === '')) {
                    bossError.textContent = 'Debe seleccionar un jefe';
                    bossSelect.classList.add('is-invalid');
                    isValid = false;
                }
            }

            const shiftSelect = document.getElementById('fk_shift');
            const shiftError = document.getElementById('fk_shift-error');
            if (!shiftSelect.value) {
                shiftError.textContent = 'Debe seleccionar un turno';
                shiftSelect.classList.add('is-invalid');
                isValid = false;
            }

            if (!isValid) return;

            const formData = new FormData(form);
            
            if (isGeneralManagerType) {
                // Si es gerente general, eliminar id_boss del formData
                formData.delete('id_boss');
            } else {
                // Asegurarse de que id_boss esté establecido para otros tipos
                formData.set('id_boss', bossSelect.value);
            }

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
                    headers,
                    body: formData
                });

                const contentType = response.headers.get('content-type');
                if (contentType?.includes('application/json')) {
                    const data = await response.json();

                    if (response.ok) {
                        toastr.success('Empleado guardado exitosamente.');
                        window.location.reload();
                    } else {
                        if (data.errors) {
                            Object.keys(data.errors).forEach(key => {
                                const input = document.getElementById(key);
                                const error = document.getElementById(`${key}-error`);

                                if (input && error) {
                                    input.classList.add('is-invalid');
                                    error.textContent = data.errors[key].join('\n');
                                }

                                toastr.error(data.errors[key].join('\n'));
                            });
                        } else {
                            toastr.error(data.message || 'Error al guardar');
                        }
                    }
                } else {
                    if (response.ok) {
                        toastr.success('Empleado guardado exitosamente.');
                        window.location.reload();
                    } else {
                        toastr.error(`Error: ${response.status} ${response.statusText}`);
                        console.error(await response.text());
                    }
                }
            } catch (err) {
                console.error('Error en la solicitud:', err);
                toastr.error('Ocurrió un error al procesar la solicitud.');
            }
        });
    }

    const addButton = document.getElementById('add-employees-btn');
    if (addButton) {
        addButton.addEventListener('click', window.toggleForm);
    }

    const cancelButton = document.getElementById('cancel-form-btn');
    if (cancelButton) {
        cancelButton.addEventListener('click', window.cancelForm);
    }

    const editButtons = document.querySelectorAll('.edit-employees-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id_employee = this.getAttribute('data-id_employee');
            const name = this.getAttribute('data-name');
            const second_name = this.getAttribute('data-second_name');
            const last_name = this.getAttribute('data-last_name');
            const second_last_name = this.getAttribute('data-second_last_name');
            const age = this.getAttribute('data-age');
            const Sex = this.getAttribute('data-sex'); 
            const type_empl = this.getAttribute('data-type_empl');
            const id_boss = this.getAttribute('data-id_boss');
            const fk_shift = this.getAttribute('data-fk_shift');

            window.editEmployees(id_employee, name, second_name, last_name, second_last_name, age, Sex, type_empl, id_boss, fk_shift);
        });
    });

    const searchInput = document.getElementById('search-input');
    const tableBody = document.getElementById('employees-table-body');

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
    
    // Inicializar la visibilidad del campo de jefe al cargar la página
    updateBossFieldVisibility();
});