<?php
$alumno_session = session();
$idTestTmp = uniqid();
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
                        <a href="<?php echo base_url() . '/alumnos/logout'; ?>" class="btn btn-neutral">Edit profile</a>
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
                                    <?php
                                    foreach ($tipos as $tipo) {
                                    ?>
                                        <table class="table table-sm table-borderless table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col"><?php echo $tipo['nombre']; ?> </th>
                                                    <th scope="col">Respuesta</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach ($areas as $area) {
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"> Area <?php echo $area['nombre_corto']; ?> </th>

                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <?php $n = 1;
                                                    foreach ($preguntas as $pregunta) {
                                                        if ($pregunta['id_area'] == $area['id'] && $pregunta['id_tipo'] == $tipo['id']) { ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $n;
                                                                                $n++ ?></th>
                                                                <td><?php echo $pregunta['pregunta']; ?> </td>
                                                                <td>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="<?php echo $n . $area['id'] . $tipo['id']; ?>" name="<?php echo $pregunta['id']; ?>" value="1" class="custom-control-input" onclick="agregarPregunta('<?php echo $idTestTmp ?>',<?php echo $pregunta['id'] ?>,1)">
                                                                        <label class="custom-control-label" for="<?php echo $n . $area['id'] . $tipo['id']; ?>">Si</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="<?php echo 10000 + $n . $area['id'] . $tipo['id']; ?>" name="<?php echo $pregunta['id']; ?>" value="0" class="custom-control-input" onclick="agregarPregunta('<?php echo $idTestTmp ?>',<?php echo $pregunta['id'] ?>,0)">
                                                                        <label class="custom-control-label" for="<?php echo 10000 + $n . $area['id'] . $tipo['id']; ?>">No</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                    <?php }
                                                    }
                                                    ?>
                                                </tbody>
                                            <?php }
                                            ?>

                                        </table>

                                    <?php }  ?>
                                    <button type="submit" class="btn btn-success float-right">
                                        <svg class="mr-2" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.2239 0L19.5999 3.376L7.1519 15.84L0.399902 9.08L3.7759 5.704L7.1519 9.08L16.2239 0ZM16.2239 2.24L7.1519 11.328L3.7759 7.992L2.6479 9.08L7.1519 13.576L17.3519 3.376L16.2239 2.24Z" fill="white" />
                                        </svg>
                                        Finalizar </button>
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
            <script src="<?php echo base_url(); ?>/assets/js/jquery.js" crossorigin="anonymous"></script>
            <script src="<?php echo base_url(); ?>/assets/js/jquery-ui.min.js" crossorigin="anonymous"></script>
            <script>
                function agregarPregunta(folio, id_pregunta, respuesta) {
                   
                                $.ajax({
                                    url: '<?php echo base_url(); ?>/temporalPreguntas/cargarPregunta/' + folio + "/" + id_pregunta + "/" + respuesta,
                                    success: function(resultado) {
                                       
                                    }
                                });
                }
            </script>