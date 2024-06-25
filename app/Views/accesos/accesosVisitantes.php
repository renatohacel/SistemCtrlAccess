<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">
            ACCESOS DE VISITANTES
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
              <h3 class="card-title"><a type="button" class="btn btn-outline-secondary" data-toggle="modal"
                  href="#registrar-modal">Registrar Acceso Manual</a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead class="text-center">
                  <tr>
                    <th>Tipo</th>
                    <th>Placas</th>
                    <th>Nombre</th>
                    <th>Domicilio</th>
                    <th>Teléfono</th>
                    <th>Asunto</th>
                    <th>Fecha/Hora</th>
                    <th>Acción</th>
                    <th>Vigilante</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach ($accesos as $acceso) { ?>
                    <?php if ($acceso['tipo'] == 'Visitante') { ?>
                      <tr>
                        <td><?= $acceso['tipo'] ?></td>
                        <td><?= $acceso['placas'] ?></td>
                        <td><?= $acceso['nombre'] ?></td>
                        <td><?= $acceso['domicilio'] ?></td>
                        <td><?= $acceso['telefono'] ?></td>
                        <td><?= $acceso['asunto'] ?></td>
                        <td><?= $acceso['fecha_a'] ?></td>
                        <td><?= $acceso['accion'] ?></td>
                        <td><?= $acceso['vigilante'] ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-warning" type="button" data-toggle="modal"
                              href="#editar-modal<?php echo $acceso['id_a'] ?>"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?= base_url('borrar_a/' . $acceso['id_a']); ?>" class="btn btn-danger"
                              type="button"><i class="fas fa-trash-alt"></i></a>
                          </div>
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

  <!--MODAL REGISTRO-->
  <div class="modal fade" id="registrar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title text-center" id="exampleModalLabel">REGISTRAR ACCESO</h5>
          <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" type="button"
            data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <form method="post" action="<?php echo base_url('guardar_a'); ?>">
          <div class="modal-body">
            <div class="form-group">
              <div class="row mt-2">
                <div class="col-6">
                  <label>Tipo</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                    </div>
                    <select class="form-control" id="tipo" name="tipo">
                      <option value="Residente">Residente</option>
                      <option value="Visitante">Visitante</option>
                    </select>
                  </div>
                </div> <!-- ##### -->

                <div class="col-6">
                  <label>Placas</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-car"></i></span>
                    </div>
                    <input class="form-control" maxlength="10" minlength="7" placeholder="AAA-AAA-AA" id="placas"
                      name="placas" type="text" required autocomplete="off" onkeypress="return validaPlacas(event);">
                  </div>
                </div>
              </div><!-- ##### -->

              <div class="row mt-2"> <!-- ##### -->
                <div class="col-6">
                  <label>Nombre</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input placeholder="Nombre(s) Apellido(s)" class="form-control" id="nombre" name="nombre"
                      type="text" autofocus required autocomplete="off" onkeypress="return soloLetras(event);">
                  </div>
                </div>
                <div class="col-6">
                  <label>Domicilio</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input placeholder="Calle #Número" class="form-control" id="domicilio" name="domicilio" type="text"
                      autofocus required autocomplete="off" onkeypress="return domicilioValida(event);">
                  </div>
                </div>
              </div><!-- ##### -->

              <div class="row mt-2"> <!-- ##### -->
                <div class="col-6">
                  <label>Teléfono</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <input type="tel" onkeypress="return soloNumeros(event);" placeholder="999 999 9999"
                      class="form-control" name="telefono" required autocomplete="off" minlength="10" maxlength="10">
                  </div>
                </div>
                <div class="col-6">
                  <label>Asunto</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-people-arrows"></i></span>
                    </div>
                    <input placeholder="Visita, etc." class="form-control" id="asunto" name="asunto" type="text"
                      autocomplete="off" onkeypress="return soloLetras(event);">
                  </div>
                </div>
              </div><!-- ##### -->

              <div class="row mt-2">
                <div class="col-6">
                  <label for="fecha">Fecha y hora:</label>
                  <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                      <div class="input-group-text">
                        <ion-icon name="calendar-sharp"></ion-icon>
                      </div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"
                      name="fecha" required autocomplete="off" />
                  </div>
                </div>
                <div class="col-6">
                  <label>Acción</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
                    </div>
                    <select class="form-control" id="accion" name="accion">
                      <option value="Entrada">Entrada</option>
                      <option value="Salida">Salida</option>
                    </select>
                  </div>
                </div>
              </div><!-- ##### -->

            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-success" type="submit">Registrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php foreach ($accesos as $acceso) { ?>
    <!--MODAL EDITAR-->
    <div class="modal fade" id="editar-modal<?php echo $acceso['id_a'] ?>" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <h5 class="modal-title text-center" id="exampleModalLabel">EDITAR ACCESO</h5>
            <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" type="button"
              data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <form method="post" action="<?php echo base_url('update_a'); ?>">
            <input type="hidden" name="id_a" value="<?php echo $acceso['id_a']; ?>">
            <div class="modal-body">
              <div class="form-group">
                <div class="row mt-2">
                  <div class="col-6">
                    <label>Tipo</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                      </div>
                      <select class="form-control" id="editarTipo" name="editarTipo">
                        <option value="Residente" <?php if ($acceso['tipo'] === 'Residente')
                          echo 'selected'; ?>>Residente
                        </option>
                        <option value="Visitante" <?php if ($acceso['tipo'] === 'Visitante')
                          echo 'selected'; ?>>Visitante
                        </option>
                      </select>
                    </div>
                  </div> <!-- ##### -->

                  <div class="col-6">
                    <label>Placas</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                      </div>
                      <input class="form-control" maxlength="10" minlength="7" placeholder="AAA-AAA-AA" id="editarPlacas"
                        name="editarPlacas" type="text" value="<?php echo $acceso['placas'] ?>" required
                        autocomplete="off" onkeypress="return validaPlacas(event);">
                    </div>
                  </div>
                </div><!-- ##### -->

                <div class="row mt-2"> <!-- ##### -->
                  <div class="col-6">
                    <label>Nombre</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input placeholder="Nombre(s) Apellido(s)" class="form-control" id="editarNombre"
                        name="editarNombre" type="text" value="<?php echo $acceso['nombre'] ?>" autofocus required
                        autocomplete="off" onkeypress="return soloLetras(event);">
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Domicilio</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                      </div>
                      <input placeholder="Calle #Número" class="form-control" id="editarDomicilio" name="editarDomicilio"
                        type="text" value="<?php echo $acceso['domicilio'] ?>" autofocus required autocomplete="off"
                        onkeypress="return domicilioValida(event);">
                    </div>
                  </div>
                </div><!-- ##### -->

                <div class="row mt-2"> <!-- ##### -->
                  <div class="col-6">
                    <label>Teléfono</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                      </div>
                      <input type="tel" class="form-control" name="editarTelefono"
                        value="<?php echo $acceso['telefono'] ?>" autofocus required minlength="10" maxlength="10"
                        autocomplete="off" onkeypress="return soloNumeros(event);">
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Asunto</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-people-arrows"></i></span>
                      </div>
                      <input placeholder="Visita, etc." class="form-control" id="editarAsunto" name="editarAsunto"
                        type="text" value="<?php echo $acceso['asunto'] ?>" autocomplete="off"
                        onkeypress="return soloLetras(event);">
                    </div>
                  </div>
                </div><!-- ##### -->

                <div class="row mt-2">
                  <div class="col-6">
                    <label for="fecha">Fecha y hora:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                      <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                        <div class="input-group-text">
                          <ion-icon name="calendar-sharp"></ion-icon>
                        </div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"
                        name="editarFecha" id="editarFecha" value="<?php echo $acceso['fecha_a'] ?>" required
                        autocomplete="off" />
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Acción</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
                      </div>
                      <select class="form-control" id="editarAccion" name="editarAccion"
                        value="<?php echo $acceso['accion'] ?>">
                        <option value="Entrada" <?php if ($acceso['accion'] === 'Entrada')
                          echo 'selected'; ?>>Entrada
                        </option>
                        <option value="Salida" <?php if ($acceso['accion'] === 'Salida')
                          echo 'selected'; ?>>Salida</option>
                      </select>
                    </div>
                  </div>
                </div><!-- ##### -->

              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <button class="btn btn-warning" type="submit">Editar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>