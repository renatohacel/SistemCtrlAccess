            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .swal2-content {
        color: white !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: "¿Es un visitante?",
            text: "La persona que intenta entrar, no está registrada como residente",
            icon: "question",
            confirmButtonText: "Registrar",
            confirmButtonClass: 'btn-success',
        }).then((result) => {
        if     (result.isConfirmed) {
                // Redirige a la página de acceso y pasa el parámetro para abrir el modal
            window.location.href = '<?php echo base_url('accesos'); ?>?openModal=true';
        }
        });

        // Agrega la clase para el texto en cualquier instancia de SweetAlert que se abra
        document.querySelectorAll('.swal2-content').forEach(item => {
            item.classList.add('texto-blanco');
        });
    });
</script>