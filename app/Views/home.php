<body>
 
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
        <div class="col-xl-12 d-flex justify-content-center ">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Ingresa tus datos </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="<?php echo base_url() . '/alumno/valida'; ?>">
                <p> En el campo DNI, si cuenta con otro documento solo utilice los 8 primeros digitos.</p>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="dni">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" maxlength="8" required autofocus>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="nombres">nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="nombre" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="apellidos">apellido</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="apellidos" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="telefono">celular</label>
                        <input class="form-control" type="text" placeholder="celular" id="telefono" name="telefono" maxlength="9">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="email">email</label>
                        <input type="" id="email" name="email" class="form-control" placeholder="email" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="carrera1">Escribe 2 carreras que te gustaría</label>
                        <input type="text" id="carrera1" name="carrera1" class="form-control" placeholder="1ra carrera" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input type="text" id="carrera2" name="carrera2" class="form-control" placeholder="2da carrera" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label class="form-control-label" for="edad">Fecha de nacimiento</label>
                        <input class="form-control" type="date" value="2000-06-24" id="edad" name="edad">
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
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="form-control-label" for="grado">Grado</label>
                        <select type="text" id="grado" name="grado" class="form-control" placeholder="Username" required>
                          <option>4to</option>
                          <option>5to</option>
                          <option>Superior</option>
                        </select>
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