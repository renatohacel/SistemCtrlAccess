<!-- Content Wrapper. Contains page content -->
<?php if (isset($errors)) { ?>
    <script>
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
            icon: 'error',
            title: '¡ERROR!, El número de télefono ya ha está registrado ',
        });
    </script>
<?php } ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        REGISTRAR RESIDENTE
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">SistemCtrlAccess</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos:</h3>
                        </div>

                        <div class="card-body">
                            <!-- Date and time -->
                            <form id="registrarResidentes" onsubmit="return validarTelefono(event)" method="post" action="<?= base_url('guardar_r') ?>" enctype="multipart/form-data">
                                <div class="form-group col-md-8">
                                    <label for="nombre">Nombre:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <ion-icon name="person-sharp"></ion-icon>
                                            </span>
                                        </div>
                                        <input onkeypress="return soloLetras(event);" type="text" class="form-control" name="nombre" placeholder="Nombre(s) Apellido(s)" required autocomplete="off" minlength="3" <?php if (isset($errors)) {
                                                                                                                                                                                                                        echo 'value="' . $nombre . '"';
                                                                                                                                                                                                                    } ?>>
                                    </div>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="domicilio">Domicilio:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <ion-icon name="location-sharp"></ion-icon>
                                            </span>
                                        </div>
                                        <input type="text" onkeypress="return domicilioValida(event);" class="form-control" name="domicilio" placeholder="Calle #Número" required autocomplete="off" <?php if (isset($errors)) {
                                                                                                                                                                                                            echo 'value="' . $domicilio . '"';
                                                                                                                                                                                                        } ?>>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="telefono">Número de teléfono:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <ion-icon name="call-sharp"></ion-icon>
                                            </span>
                                        </div>
                                        <input type="tel" onkeypress="return soloNumeros(event);" placeholder="999 999 9999" class="form-control" name="telefono" required autocomplete="off" minlength="10" maxlength="10" autofocus>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fecha">Fecha de Registro:</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <ion-icon name="calendar-sharp"></ion-icon>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="fecha" required autocomplete="off" readonly>

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-block btn-success">Registrar</button>
                                <a type="button" class="btn btn-block btn-outline-secondary" href="<?= base_url('listar_r') ?>">Cancelar</a>

                            </form>
                            <!-- /.form group -->

                            <!--FIN DEL FORM-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->