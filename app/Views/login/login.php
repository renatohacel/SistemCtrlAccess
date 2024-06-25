<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>SistemCtrlAccess</title>
    <link rel="icon" href="<?php echo base_url() ?>dist/img/seguridad.png" type="image/png">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/style.css" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="post" action="<?php base_url() ?>valida" class="sign-in-form">
                    <h2 class="title">Inicio de Sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input onkeypress="return validaUsuario(event);" type="text" placeholder="Usuario" id="user"
                            name="user" required autocomplete="off" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="password" id="password" required
                            autocomplete="off" />
                    </div>
                    <input type="submit" value="Iniciar" class="btn solid" />

                    <?php if (isset($error)) { ?>
                        <div>
                        <?php echo $error; ?> <br>
                        </div>
                    <?php } ?>

                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="image">
                    <ion-icon name="logo-model-s" class="logo-icon"></ion-icon>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <script src="<?php echo base_url() ?>dist/js/validaInputs.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?php echo base_url() ?>plugins/sweetalert2/sweetalert2.min.js"></script>

</body>

</html>