                    <!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SistemCtrlAccess</title>
    <link rel="icon" href="<?php echo base_url() ?>dist/img/seguridad.png" type="image/png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url() ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="<?php echo base_url(); ?>dist/js/lottie-player.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/user-image.css'); ?>">

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <lottie-player src="<?php echo base_url(); ?>dist/img/carga2.json" background="transparent" speed="1"
                style="width: 400px; height: 400px;" autoplay></lottie-player>
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>home" class="brand-link">
                <img src="<?php echo base_url() ?>dist/img/seguridad.png" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light"><b>SCA</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url() ?>dist/img/person1.png" class="img-circle elevation-2"
                            alt="UserImage">
                    </div>
                    <div class="info">
                        <span class="d-block"><?= session()->get('nombre'); ?></span>
                        <script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <style>
                            .swal2-content {
                                color: white !important;
                            }

                            .swal2-icon img {
                                outline: 2px solid transparent !important;
                            }

                            .swal2-icon i {
                                outline: none !important;
                                border: none !important;
                            }
                        </style>
                        <script>
                            jQuery(document).ready(function () {
                                $('.user-panel .image img').hover(function () {
                                    // Cambiar la imagen cuando el cursor está sobre ella
                                    $(this).attr('src', '<?php echo base_url() ?>dist/img/logout.png');
                                }, function () {
                                    // Restaurar la imagen cuando el cursor se aleje
                                    $(this).attr('src', '<?php echo base_url() ?>dist/img/person1.png');
                                });

                                $('.user-panel .image img').click(function () {
                                    // Mostrar SweetAlert2 para confirmar la acción
                                    Swal.fire({
                                        title: '¿Cerrar sesión?',
                                        text: '¿Estás seguro de que deseas cerrar la sesión?',
                                        imageUrl: '<?php echo base_url() ?>dist/img/logoutalert.svg',
                                        imageWidth: 400,
                                        imageHeight: 200,
                                        showCancelButton: true,
                                        confirmButtonText: 'Sí, cerrar sesión',
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        // Si el usuario confirma, redirige a la nueva página
                                        if (result.isConfirmed) {
                                            // Redirigir a la nueva página
                                            window.location.href = '<?php echo base_url() ?>logout';
                                        }
                                    });
                                });
                            });
                        </script>




                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <?php if (session()->get('user') == 'admin') { ?>
                            <!--VIGILANTES-->
                            <li class="nav-item menu-close">
                                <a href="#" class="nav-link ml-2">
                                    <ion-icon name="shield-half-outline"></ion-icon>
                                    <p class="ml-2">
                                        Vigilantes
                                        <i class="right fas fa-angle-left mr-1"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('crear_v') ?>" class="nav-link">
                                            <ion-icon name="create-sharp"></ion-icon>
                                            <p>Registrar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('listar_v') ?>" class="nav-link">
                                            <ion-icon name="id-card-sharp"></ion-icon>
                                            <p>Consultar Registros</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

                        <!--RESIDENTES-->
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link ml-1">
                                <ion-icon name="car-sport-sharp" class="nav-icon"></ion-icon>
                                <p>
                                    Residentes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('crear_r') ?>" class="nav-link">
                                        <ion-icon name="create-sharp"></ion-icon>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('listar_r') ?>" class="nav-link">
                                        <ion-icon name="id-card-sharp"></ion-icon>
                                        <p>Consultar Registros</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--ACCESO-->
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link ml-2">
                                <i class="fas fa-exchange-alt"></i>
                                <p class="ml-2">
                                    Accesos
                                    <i class="right fas fa-angle-left mr-1"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('accesos') ?>" class="nav-link">
                                        <i class="fas fa-compress-alt mr-1"></i>
                                        <p>Generales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('accesos_r') ?>" class="nav-link">
                                        <i class="fas fa-house-user mr-1"></i>
                                        <p>Residentes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('accesos_visit') ?>" class="nav-link">
                                        <i class="fas fa-users mr-1"></i>
                                        <p>Visitantes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </nav>
                <!-- /.sidebar-menu -->

            </div>
            <!-- /.sidebar -->

        </aside>