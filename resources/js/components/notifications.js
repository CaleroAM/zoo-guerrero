import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

// Configuración global
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-bottom-right',
    timeOut: 5000,
};

// Mostrar notificaciones desde variables de Blade (si existen)
if (window.laravelSuccess) {
    toastr.success(window.laravelSuccess);
}
if (window.laravelError) {
    toastr.error(window.laravelError);
}
if (window.laravelInfo) {
    toastr.info(window.laravelInfo);
}
if (window.laravelWarning) {
    toastr.warning(window.laravelWarning);
}
