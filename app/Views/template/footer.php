<!-- Main Footer -->
<footer class="main-footer" style="font-size: smaller; padding: 5px;">
  <strong>Copyright &copy; 2022-2024 <a href="<?= base_url('acercaDe') ?>">SistemCtrlAccess</a>.</strong>
  Todos los derechos reservados.
  <div class="float-right d-none d-sm-inline-block" style="font-size: smaller;">
    <b>Beta</b> Version
  </div>
</footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--VALIDACIONES-->
<script src="<?php echo base_url() ?>dist/js/validaInputs.js"></script>
<!-- jQuery -->
<script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>dist/js/demo.js"></script>

<!-- PAGE /plugins -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url() ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url() ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url() ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url() ?>plugins/dropzone/min/dropzone.min.js"></script>


<!--ICONS-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!--DATE SCRIPT-->
<script>
  $(function () {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()
    //Date picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });
    //Date and time picker
    $('#reservationdatetime').datetimepicker({
      icons: {
        time: 'far fa-clock'
      }
    });
    $('#reservationdatetime').on('keypress', function (event) {
      event.preventDefault();
    });

    // Deshabilitar edición del campo de entrada
    $('#reservationdatetime').on('keypress', function (event) {
      event.preventDefault();
    });

    // Mostrar el selector de fecha y hora al hacer clic en el campo de entrada
    $('#reservationdatetime').on('click', function () {
      $(this).datetimepicker('show');
    });
  });
</script>
<!--DATATABLES SCRIPT-->
<script>
  $(function () {
    $('#example2').DataTable({
      "order": [
        [6, "desc"]
      ],
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
        "search": "Buscar",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
        "infoFiltered": "(filtrado de _MAX_ entradas en total)",
        "paginate": {
          "previous": "Anterior",
          "next": "Siguiente",
        },
        "emptyTable": "No se encontraron registros",
        "zeroRecords": "No se encontraron registros"
      }
    });
  });
</script>
<script>
  $(function () {
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
        "search": "Buscar",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
        "infoFiltered": "(filtrado de _MAX_ entradas en total)",
        "paginate": {
          "previous": "Anterior",
          "next": "Siguiente",
        },
        "emptyTable": "No se encontraron registros",
        "zeroRecords": "No se encontraron registros"
      }
    });
  });
</script>

<script>
  $(function () {
    $('#exampleR').DataTable({
      "order": [
        [5, "desc"]
      ],
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
        "search": "Buscar",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
        "infoFiltered": "(filtrado de _MAX_ entradas en total)",
        "paginate": {
          "previous": "Anterior",
          "next": "Siguiente",
        },
        "emptyTable": "No se encontraron registros",
        "zeroRecords": "No se encontraron registros"
      }
    });
  });
</script>

<script>
  $(function () {
    $('#exampleVigilantes').DataTable({
      "order": [
        [3, "desc"]
      ],
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
        "search": "Buscar",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
        "infoFiltered": "(filtrado de _MAX_ entradas en total)",
        "paginate": {
          "previous": "Anterior",
          "next": "Siguiente",
        },
        "emptyTable": "No se encontraron registros",
        "zeroRecords": "No se encontraron registros"
      }
    });
  });
</script>

<?php if (session()->get('user') != 'admin') { ?>
  <script>
    function bloquearF12(e) {
      if (e.keyCode === 123) { 
        e.preventDefault();
      }
    }
    // Agregar un evento de teclado para detectar cuando se presiona una tecla

    document.addEventListener('keydown', bloquearF12);
    //FUNCION PARA BLOQUEAR CLICK DERECHO SOLO VIGILANTES
    function disableIE() {
      if (document.all) {
        return false;
      }
    }
    function disableNS(e) {
      if (document.layers || (document.getElementById && !document.all)) {
        if (e.which == 2 || e.which == 3) {
          return false;
        }
      }
    }
    if (document.layers) {
      document.captureEvents(Event.MOUSEDOWN);
      document.onmousedown = disableNS;
    }
    else {
      document.onmouseup = disableNS;
      document.oncontextmenu = disableIE;
    }
    document.oncontextmenu = new Function("return false");
  </script>
<?php } ?>