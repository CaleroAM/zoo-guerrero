/**
 * Foods module - Maneja operaciones CRUD para alimentos
 */
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import $ from 'jquery';

window.toggleForm = function () {
    const form = document.getElementById('animalsFormContainer');
    const animalsForm = document.getElementById('animals-form');

    if (animalsForm) {
        animalsForm.reset();
        const storeRoute = animalsForm.getAttribute('data-store-route');
        animalsForm.setAttribute('action', storeRoute);

        document.getElementById('form-method').value = 'POST';
        document.getElementById('id_animal').value = '';

        // Limpiar mensajes de error anteriores
        const errorMessages = animalsForm.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = animalsForm.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const submitButton = document.querySelector('#animalsFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Guardar';
        }
    }

    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
};

window.cancelForm = function () {
    const form = document.getElementById('animalsFormContainer');
    if (form) {
        form.style.display = 'none';
    }
};

window.editAnimals = function (id_animal, name, age, height, weigh, sex, fecha_nac, descripcion, fk_specie, fk_zone) {
    const formContainer = document.getElementById('animalsFormContainer');
    const form = document.getElementById('animals-form');

    if (formContainer && form) {
        formContainer.style.display = 'block';

        // Limpiar mensajes de error anteriores
        const errorMessages = form.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(el => { el.textContent = ''; });
        const invalidInputs = form.querySelectorAll('.is-invalid');
        invalidInputs.forEach(el => { el.classList.remove('is-invalid'); });

        const updateUrlBase = form.getAttribute('data-update-route');
        form.setAttribute('action', updateUrlBase.replace(':id', id_animal));
        document.getElementById('form-method').value = 'PUT';

        document.getElementById('id_animal').value = id_animal;
        document.getElementById('name').value = name;
        document.getElementById('age').value = age;
        document.getElementById('height').value = height;
        document.getElementById('weigh').value = weigh;

        if (sex === 'Macho') {
            document.getElementById('sexo_m').checked = true;
        } else if (sex === 'Hembra') {
            document.getElementById('sexo_h').checked = true;
        }

        document.getElementById('fecha_nac').value = fecha_nac;
        document.getElementById('descripcion').value = descripcion;
        
        const speciesSelect = document.getElementById('fk_specie');
        if (speciesSelect) {
            
            if (fk_specie === null || fk_specie === '') {
                speciesSelect.value = '';
            } else {
                speciesSelect.value = fk_specie;
            }
            
            if (fk_specie && !Array.from(speciesSelect.options).some(option => option.value === fk_specie.toString())) {
                toastr.warning('La especie seleccionada anteriormente ya no está disponible.');
                speciesSelect.value = '';
            }
        }

        const zonesSelect = document.getElementById('fk_zone');
        if (zonesSelect) {
            
            if (fk_zone === null || fk_zone === '') {
                zonesSelect.value = '';
            } else {
                zonesSelect.value = fk_zone;
            }
            
            if (fk_zone && !Array.from(zonesSelect.options).some(option => option.value === fk_zone.toString())) {
                toastr.warning('La zona seleccionada anteriormente ya no está disponible.');
                zonesSelect.value = '';
            }
        }

        const submitButton = document.querySelector('#animalsFormContainer button[type="submit"]');
        if (submitButton) {
            submitButton.textContent = 'Actualizar';
        }

        formContainer.scrollIntoView({ behavior: 'smooth' });
    }
};



document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('animals-form');

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
            
            
           
            const speciesSelect = document.getElementById('fk_specie')
            if (!speciesSelect.value) {
                document.getElementById('fk_specie').textContent = 'Debe seleccionar un alimento';
                speciesSelect.classList.add('is-invalid');
                isValid = false;
            }

            if (!isValid) {
                return;
            }

            const zonesSelect = document.getElementById('fk_zone')
            if (!zonesSelect.value) {
                document.getElementById('fk_zone').textContent = 'Debe seleccionar un alimento';
                zonesSelect.classList.add('is-invalid');
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
                            toastr.success('Animal guardado exitosamente.');
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
                            toastr.success('Animal guardado exitosamente.');
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

    const addButton = document.getElementById('add-animals-btn');
    if (addButton) {
        addButton.addEventListener('click', window.toggleForm);
    }

    const cancelButton = document.getElementById('cancel-form-btn');
    if (cancelButton) {
        cancelButton.addEventListener('click', window.cancelForm);
    }

    const editButtons = document.querySelectorAll('.edit-animals-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id_animal = this.getAttribute('data-id_animal');
            const name = this.getAttribute('data-name');
            const age = this.getAttribute('data-age');
            const height = this.getAttribute('data-height');
            const weigh = this.getAttribute('data-weigh');
            const sex = this.getAttribute('data-sex');
            const fecha_nac = this.getAttribute('data-fecha_nac');
            const descripcion = this.getAttribute('data-descripcion');
            const fk_specie = this.getAttribute('data-fk_specie');
            const fk_zone = this.getAttribute('data-fk_zone');
            
            window.editAnimals(id_animal, name, age, height, weigh, sex, fecha_nac, descripcion, fk_specie, fk_zone);
        });
    });

    // Búsqueda en vivo
    const searchInput = document.getElementById('search-input');
    const tableBody = document.getElementById('animals-table-body');

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