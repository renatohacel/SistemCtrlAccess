<style>
  .fade-out {
    opacity: 0;
    transition: opacity 0.1s ease-out;
  }

  @keyframes floatAnimation {
    0% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-10px);
    }

    100% {
      transform: translateY(0);
    }
  }

  .lottie-floating {
    animation: floatAnimation 0s ease-in-out infinite;
    /* Ajusta la duración y el tipo de animación según tus preferencias */
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

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
  <section class="content" id="content">
    <div class="container-fluid d-flex justify-content-center align-items-center">
      <div class="row">
        <div class="col">
          
          <script src="<?php echo base_url(); ?>dist/js/lottie-player.js"></script>
          <lottie-player class="ml-4" src="<?php echo base_url(); ?>dist/img/fondo_inicio4.json" background="transparent" speed="1"
            style="width: 300px; height: 300px;" loop autoplay></lottie-player>
          <div class="col">
            <h1 class="m-0">
              SistemCtrlAccess
            </h1>
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