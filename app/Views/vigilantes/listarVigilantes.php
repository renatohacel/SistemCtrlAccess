<!-- Content Wrapper. Contains page content -->
<?php if (isset($registrado) && $registrado) { ?>
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
            icon: 'success',
            title: '¡Acción sobre el vigilante exitosa!',
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
                        CONSULTA DE REGISTROS - VIGILANTES
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Vigilantes Registrados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="exampleVigilantes" class="table table-bordered table-striped">
                                <a type="button" class="btn btn-outline-secondary" href="<?php echo base_url('crear_v') ?>">Registrar Vigilante</a>
                                <thead class="text-center">
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Fecha de registro</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php foreach ($vigilantes as $vigilante) { ?>
                                        <?php if ($vigilante['user'] != 'admin') { ?>
                                            <tr>
                                                <td><?= $vigilante['user'] ?></td>
                                                <td><?= $vigilante['nombre'] ?></td>
                                                <td><?= $vigilante['telefono'] ?></td>
                                                <td><?= $vigilante['fechar_vigilante'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('editar_v/' . $vigilante['id_v']); ?>" class="btn btn-warning" type="button"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="<?= base_url('borrar_v/' . $vigilante['id_v']); ?>" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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