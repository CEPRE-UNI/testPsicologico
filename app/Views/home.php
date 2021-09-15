<body>
  <!-- Sidenav -->
  <!-- <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?php echo base_url(); ?>/<?php echo base_url(); ?>/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div> -->
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->

    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex  justify-content-center align-items-center" style="min-height: 500px; background-image: url(<?php echo base_url(); ?>/assets/img/theme/principal.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex justify-content-center text-center">
        <div class="row">
          <div class="col-lg-12 col-md-10">
            <div class="logo ">
              <a href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="CEPRE-UNI"></a>
            </div>
          </div>
          <div class="col-lg-12 col-md-10">
            <h1 class="display-2 text-white">Instrucciones</h1>
            <p class="text-white mt-0 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium aliquid asperiores maiores obcaecati provident reiciendis quibusdam dicta maxime, cum quod sapiente temporibus enim voluptate, nemo quasi in a quos ducimus.</p>
            <!-- <a href="#!" class="btn btn-neutral">Edit profile</a> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--9">
      <div class="row">
        <!-- <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../<?php echo base_url(); ?>/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../<?php echo base_url(); ?>/assets/img/theme/team-4.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  Jessica Jones<span class="font-weight-light">, 27</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <div class="col-xl-12 d-flex justify-content-center ">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Ingresa tus datos </h3>
                </div>
                <!-- <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div> -->
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="<?php echo base_url().'/alumno/valida'; ?>">
                <!-- <h6 class="heading-small text-muted mb-4">User information</h6> -->
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="dni">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" maxlength="8" required autofocus > 
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="nombre">Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombre" required>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="apellido">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="edad">Fecha de nacimiento</label>
                        <input class="form-control" type="date" value="2000-06-24"  id="edad" name="edad">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="sexo">sexo</label>
                        <select type="text" id="sexo" name="sexo" class="form-control" placeholder="Username" required>
                          <option>Masculino</option>
                          <option>Femenino</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="grado">Grado</label>
                        <input type="text" id="grado" name="grado" class="form-control" placeholder="grado" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <div class="form-group">
                        <input type="submit" class="btn  btn-primary" value="Iniciar">
                      </div>
                    </div>
                  </div>
                  <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php } ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>