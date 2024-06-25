<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .swal2-content {
        color: white !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: "¡Acceso permitido!",
            text: "Identificación éxitosa de residente",
            icon: "success",
            confirmButtonText: "Mostrar",
            confirmButtonClass: 'btn-success',
        }).then((result) => {
            if (result.isConfirmed) {
                var baseUrl = '<?php echo base_url('accesos'); ?>';
                window.location.href = baseUrl;
            }
        });

        // Agrega la clase para el texto en cualquier instancia de SweetAlert que se abra
        document.querySelectorAll('.swal2-content').forEach(item => {
            item.classList.add('texto-blanco');
        });
    });
</script>

