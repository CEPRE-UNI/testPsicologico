<?php
$alumno_session = session();
?>

<body>

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->

        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello Jesse</h1>
                        <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
                        <a href="#!" class="btn btn-neutral">Edit profile</a>
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
                                    <h3 class="mb-0">Tomar Test </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" action="<?php echo base_url() . '/alumnos/valida'; ?>">
                                <!-- <h6 class="heading-small text-muted mb-4">User information</h6> -->
                                <div class="pl-lg-4">
                                    <table class="table table-sm table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Actividades</th>
                                                <th scope="col">Respuesta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Arreglar artefactos eléctricos</td>
                                                <!-- <td>Reparar autos. </td>
                                                <td>Arreglar artefactos mecánicos. </td>
                                                <td>Construir con madera</td>
                                                <td>Manejar un camión o tractor. </td>
                                                <td>Usar herramientas. </td>
                                                <td>Trabajar con motos</td>
                                                <td>Llevar cursos de manualidades</td>
                                                <td>Llevar cursos de dibujo mecánico. </td>
                                                <td>Llevar cursos de carpintería o ebanistería</td>
                                                <td>Llevar cursos de mecánica automotriz</td> -->
                                                <td>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline1">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline2">No</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>JaArreglar artefactos mecánicos.cob</td>
                                                <td>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="dos1" name="dos" class="custom-control-input">
                                                        <label class="custom-control-label" for="dos1">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="dos2" name="dos" class="custom-control-input">
                                                        <label class="custom-control-label" for="dos2">No</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td >Manejar un camión o tractor</td>
                                                <td>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="tres1" name="tres" class="custom-control-input">
                                                        <label class="custom-control-label" for="tres1">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="tres2" name="tres" class="custom-control-input">
                                                        <label class="custom-control-label" for="tres2">No</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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