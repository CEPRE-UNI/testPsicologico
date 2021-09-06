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
                                <?php
                                        foreach ($tipos as $tipo) {
                                        ?>
                                    <table class="table table-sm table-borderless table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col"><?php echo $tipo['nombre'];?> </th>
                                                <th scope="col">Respuesta</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        foreach ($areas as $area) {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"> Area <?php echo $area['nombre_corto'];?> </th>

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
                                                                    <input type="radio" id="<?php echo $n.$area['id'].$tipo['id'];?>" name="<?php echo $pregunta['id'];?>" class="custom-control-input">
                                                                    <label class="custom-control-label" for="<?php echo $n.$area['id'].$tipo['id'];?>">Si</label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="<?php echo 10000+$n.$area['id'].$tipo['id'];?>" name="<?php echo $pregunta['id'];?>" class="custom-control-input">
                                                                    <label class="custom-control-label" for="<?php echo 10000+$n.$area['id'].$tipo['id'];?>">No</label>
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