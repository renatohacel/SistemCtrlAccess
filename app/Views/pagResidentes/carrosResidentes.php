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
      title: '¡Acción sobre el carro exitosa!',
    });
  </script>
<?php } ?>

<?php if (isset($errors)) { ?>
  <script>
    let ToastErrors = Swal.mixin({
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
    ToastErrors.fire({
      icon: 'error',
      title: '<?php echo $errors; ?>',
    });
    $(document).ready(function() {
      $('#registrar-modal').modal('show');
    });
  </script>
<?php } ?>

<?php if (session()->has('bandera')) { ?>
  <script>
    let ToastErrorsUpdate = Swal.mixin({
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
    ToastErrorsUpdate.fire({
      icon: 'error',
      title: '¡ERROR!, la placa ya ha sido registrada',
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
            CONSULTA DE CARROS
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
            <div class="card-header d-flex justify-content-left">
              <h3 class="card-title"><a type="button" class="btn btn-outline-secondary" data-toggle="modal" href="#registrar-modal">Registrar Carro</a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <h3><?php echo strtoupper($residente['nombre']); ?></h3>
              <table id="exampleVigilantes" class="table table-bordered table-striped">
                <thead class="text-center">
                  <tr>
                    <th>Placas</th>
                    <th>Color</th>
                    <th>Modelo</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach ($carros as $carro) { ?>
                    <tr>
                      <td><?php echo $carro['placas'] ?></td>
                      <td><?php echo $carro['color'] ?></td>
                      <td><?php echo $carro['modelo'] ?></td>
                      <td>
                        <a href="#editar-modal-<?php echo $carro['placas'] ?>" data-toggle="modal" class="btn btn-warning btn mr-2" type="button"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?php echo base_url('borrar_c/' . $carro['placas'] . '/' . $carro['id_r']) ?>" class="btn btn-danger btn" type="button"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
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
  <div class="modal fade" id="registrar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title text-center" id="exampleModalLabel">REGISTRAR CARRO</h5>
          <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" type="button" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <form method="post" action="<?php echo base_url('guardar_c'); ?>">
          <div class="modal-body">
            <div class="form-group">
              <div class="row mt-2">
                <div class="col-sm-12">
                  <label>Placas</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-car"></i></span>
                    </div>
                    <input onkeypress="return validaPlacas(event);" class="form-control" maxlength="10" minlength="7" placeholder="AAA-AAA-AA" id="placas" name="placas" type="text" required autocomplete="off">
                  </div>
                </div>
              </div> <!--row-->
              <div class="row mt-2">
                <div class="col-sm-12">
                  <label>Color</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-palette"></i></i></span>
                    </div>
                    <input onkeypress="return soloLetras(event);" placeholder="Azul, etc" maxlength="20" class="form-control" id="color" name="color" type="text" autofocus required autocomplete="off">
                  </div>
                </div>
              </div><!-- ##### -->
              <div class="row mt-2">
                <div class="col-sm-12">
                  <label>Modelo</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-car-side"></i></span>
                    </div>
                    <input onkeypress="return alphanumerico(event);" placeholder="Nissan Versa, etc" maxlength="20" class="form-control" id="modelo" name="modelo" type="text" autofocus required autocomplete="off">
                    <input type="hidden" name="id_r" id="id_r" value="<?= $residente['id_r'] ?>">
                  </div>
                </div>
              </div><!-- ##### -->
            </div><!-- ##### -->
            <div class="modal-footer justify-content-center">
              <button class=" btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <button class="btn btn-success" type="submit">Registrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php foreach ($carros as $carro) { ?>
    <div class="modal fade" id="editar-modal-<?php echo $carro['placas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <h5 class="modal-title text-center" id="exampleModalLabel">EDITAR CARRO</h5>
            <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" type="button" data-dismiss="modal" aria-label="Close">
            </button>
          </div>

          <form method="post" action="<?php echo base_url('update_c'); ?>">
          <input type="hidden" value="<?php echo $carro['placas'] ?>" id="modal">
            <div class="modal-body">
              <div class="form-group">
                <div class="row mt-2">
                  <div class="col-sm-12">
                    <label>Placas</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                      </div>
                      <input onkeypress="return validaPlacas(event);" value="<?php echo $carro['placas'] ?>" class="form-control" maxlength="10" minlength="7" placeholder="AAA-AAA-AA" id="editarPlacas" name="editarPlacas" type="text" required autocomplete="off">
                    </div>
                  </div>
                </div> <!--row-->
                <div class="row mt-2">
                  <div class="col-sm-12">
                    <label>Color</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-palette"></i></i></span>
                      </div>
                      <input onkeypress="return soloLetras(event);" value="<?php echo $carro['color'] ?>" placeholder="Azul, etc" maxlength="20" class="form-control" id="editarColor" name="editarColor" type="text" autofocus required autocomplete="off">
                    </div>
                  </div>
                </div><!-- ##### -->
                <div class="row mt-2">
                  <div class="col-sm-12">
                    <label>Modelo</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-car-side"></i></span>
                      </div>
                      <input onkeypress="return alphanumerico(event);" value="<?php echo $carro['modelo'] ?>" placeholder="Nissan Versa, etc" maxlength="20" class="form-control" id="editarModelo" name="editarModelo" type="text" autofocus required>
                      <input type="hidden" name="editarId_r" id="editarId_r" value="<?php echo $residente['id_r'] ?>" autocomplete="off">
                    </div>
                  </div>
                </div><!-- ##### -->
              </div><!-- ##### -->
              <div class="modal-footer justify-content-center">
                <button class=" btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-warning" type="submit">Editar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>