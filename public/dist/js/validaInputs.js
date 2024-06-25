
function validaUsuario(evt) {
    let key = evt.keyCode || evt.which;

    let Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    if ((key > 64 && key < 91) || (key > 96 && key < 123) || key == 13 || key == 8 || key == 32 || key == 46) {
        return true;
    } else {
        Toast.fire({
            icon: 'warning',
            title: 'No se permiten números o carácteres especiales',
        });
        return false;
    }
}
function soloNumeros(evt) {
    let key = evt.keyCode || evt.which;

    if ((key > 47 && key < 58) || key == 13 || key == 8 || key == 32) {
        return true;

    } else {
        let Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        Toast.fire({
            icon: 'warning',
            title: 'Solo se permiten números',
        });
        return false;
    }
}

function soloLetras(evt) {
    let key = evt.keyCode || evt.which;
    let character = String.fromCharCode(key);

    let regex = /^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]+$/;

    if (regex.test(character) || key == 13 || key == 8 || key == 32) {
        return true;
    } else {
        let Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        Toast.fire({
            icon: 'warning',
            title: 'Solo se permiten letras',
        });
        return false;
    }
}

function alphanumerico(evt) {
    let key = evt.keyCode || evt.which;
    let character = String.fromCharCode(key);

    let regex = /^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]+$/;

    if (regex.test(character) || (key > 47 && key < 58) || key == 13 || key == 8 || key == 32) {
        return true;
    } else {
        let Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });

        Toast.fire({
            icon: 'warning',
            title: 'Solo se permiten letras y números',
        });
        return false;
    }
}

function domicilioValida(evt) {
    let key = evt.keyCode || evt.which;
    let character = String.fromCharCode(key);

    let regex = /^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]+$/;

    if (regex.test(character) || key == 35 || (key > 47 && key < 58) || key == 13 || key == 8 || key == 32) {
        return true;
    } else {
        let Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });

        Toast.fire({
            icon: 'warning',
            title: 'Por favor sigue el formato: Calle # Número, solo se permiten letras, símbolo # y números',
        });
        return false;
    }
}

function validaPlacas(evt) {
    let key = evt.keyCode || evt.which;
    let character = String.fromCharCode(key);
    console.log("Función placasValida activada");
    let regex = /^[a-zA-Z0-9áéíóúüñÁÉÍÓÚÜÑ\s-]+$/;

    if (regex.test(character) || key == 13 || key == 8) {
        return true;
    } else {
        let Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });

        Toast.fire({
            icon: 'warning',
            title: 'Por favor sigue el formato: AAA-AAA-..., solo se permiten letras, guiones y números',
        });
        return false;
    }
}



