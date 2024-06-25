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
                        EDITAR VIGILANTE
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
                            <form method="post" action="<?php echo base_url('update_v') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id_v" value="<?php echo $vigilante['id_v']; ?>">
                                <input type="hidden" name="fecha" value="<?php echo $vigilante['fechar_vigilante']; ?>">

                                <div class="form-group col-md-8">
                                    <label for="usuario">Usuario:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <ion-icon name="person-sharp"></ion-icon>
                                            </span>
                                        </div>
                                        <input onkeypress="return validaUsuario(event);" value="<?php echo $vigilante['user']; ?>" type="text" class="form-control" name="usuario" placeholder="nombre.apellido" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="password">Contraseña:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <ion-icon name="key-sharp"></ion-icon>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" name="password" placeholder="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="nombre">Nombre:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <ion-icon name="body-sharp"></ion-icon>
                                            </span>
                                        </div>
                                        <input onkeypress="return soloLetras(event);" value="<?php echo $vigilante['nombre']; ?>" type="text" class="form-control" name="nombre" placeholder="Nombre(s) Apellido(s)" required autocomplete="off">
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
                                        <input onkeypress="return soloNumeros(event);" value="<?php echo $vigilante['telefono']; ?>" type="tel" class="form-control" name="telefono" required autocomplete="off" minlength="10" maxlength="10">
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-block btn-warning">Editar</button>
                                <a type="button" class="btn btn-block btn-outline-secondary" href="<?php echo base_url('listar_v') ?>">Cancelar</a>
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