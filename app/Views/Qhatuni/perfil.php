<?php
$alumno_session = session();
?>

<body>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->

    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(<?php echo base_url(); ?>/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex justify-content-center text-center">
        <!-- <div class="row">
          <div class="col-lg-12 col-md-10">
            <h1 class="display-2 text-white">Hello Jesse</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
          </div>
        </div> -->
        <div class="row justify-content-center mt-4">
          <div class="col-xl-8 col-lg-8 col-sm-10 col-12">
            <div class="card card-profile">
              <img src="<?php echo base_url(); ?>/assets/img/theme/portadaAlumno.jpg" alt="Image placeholder" class="card-img-top">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a>
                      <?php if ($alumno_session->sexo == "Femenino") { ?>
                        <img src="<?php echo base_url(); ?>/assets/img/theme/team-4.jpg" class="rounded-circle">
                      <?php } else { ?>
                        <img src="<?php echo base_url(); ?>/assets/img/theme/team-5.jpg" class="rounded-circle">
                      <?php } ?>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                  <a href="<?php echo base_url() . '/qhatuni'; ?>" class="btn btn-sm btn-info  mr-4 ">Volver a tomar Test</a>
                  <a href="<?php echo base_url() . '/alumno/logout'; ?>" class="btn btn-sm btn-default float-right">Salir</a>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center">
                      <!-- <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div> -->
                      <?php foreach ($dataNotas as $nota) { ?>
                        <div>
                          <span class="heading"><?php echo $nota['suma_nota'] ?></span>
                          <span class="description"><?php echo $nota['nombre'] ?></span>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h5 class="h3"> <i class="fas fa-user"></i>
                    <?php echo $alumno_session->nombres . " " . $alumno_session->apellidos; ?><span class="font-weight-light">,
                      <?php
                      $nacimiento = new DateTime($alumno_session->fecha_nac);
                      $ahora = new DateTime(date("Y-m-d"));
                      $diferencia = $ahora->diff($nacimiento);
                      echo $diferencia->format("%y"); ?></span>
                  </h5>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i> <i class="fas fa-envelope"></i><?php echo " " . $alumno_session->email; ?>
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i><i class="fas fa-briefcase"></i><?php echo  " Carreras que me gustan: " . $alumno_session->carrera1 . " - " . $alumno_session->carrera2; ?>
                  </div>

                </div>
                <div class="pl-lg-12">
                  <table class="table table-sm table-borderless table-responsive-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"> Carrera </th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Areas</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $n = 1;
                      foreach ($dataClaves as $clave) { ?>
                        <tr>
                          <th scope="row"> <?php echo $n;
                                            $n++; ?> </th>
                          <th scope="row"> <?php echo $clave['carrera']; ?> </th>
                          <th scope="row"> <?php echo $clave['nombre_grado']; ?> </th>
                          <th scope="row"> <?php echo $clave['nombre_area1'] . "-" . $clave['nombre_area2']; ?> </th>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid">
      <br>