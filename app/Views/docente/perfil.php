<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-12 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0"><?php echo $titulo; ?></h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/docente/alumnos"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a><?php echo $titulo; ?></a></li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt-2 mt--4">
    <div class="row">
        <div class="col-xl-12 order-xl-2">
            <div class="card card-profile">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <?php if ($dataPerfil['sexo'] == "Femenino") { ?>
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
                        <!-- <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                        <a href="#" class="btn btn-sm btn-default float-right">Message</a> -->
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-center mt-3">
                        <h5 class="h3"> <i class="fas fa-user"></i>
                            <?php echo $dataPerfil['nombres'] . " " . $dataPerfil['apellidos']; ?><span class="font-weight-light">,
                                <?php
                                $nacimiento = new DateTime($dataPerfil['fecha_nac']);
                                $ahora = new DateTime(date("Y-m-d"));
                                $diferencia = $ahora->diff($nacimiento);
                                echo $diferencia->format("%y"); ?></span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i> <i class="fas fa-envelope"></i><?php echo " " . $dataPerfil['email']; ?>
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i><i class="fas fa-briefcase"></i><?php echo " " . $dataPerfil['carrera1'] ?><br>
                            <i class="ni business_briefcase-24 mr-2"></i><i class="fas fa-briefcase"></i><?php echo  " " . $dataPerfil['carrera2']; ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <?php foreach ($dataNotas as $nota) { ?>
                                                <th scope="col" class="sort" data-sort="name">
                                                    <?php echo $nota['nombre'] ?>
                                                </th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <tr>
                                            <?php foreach ($dataNotas as $nota) { ?>
                                                <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm"><?php echo $nota['suma_nota']  ?></span>
                                                        </div>
                                                    </div>
                                                </th>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-stats">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- <h5 class="card-title text-uppercase text-muted mb-0">Notas mayores</h5> -->
                                                    <?php foreach ($dataNotasMayores as $nota) { ?>
                                                        <div>
                                                            <span class="heading h2 font-weight-bold mb-0"><?php echo $nota['suma_nota'] ?></span>
                                                            <span class="description h2 font-weight-bold mb-0"><?php echo $nota['nombre'] ?></span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                        <i class="ni ni-active-40"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <!-- Card header -->
                            <!-- <div class="card-header border-0">
                                <h3 class="mb-0">Claves</h3>
                            </div> -->
                            <!-- Light table -->
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead >
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