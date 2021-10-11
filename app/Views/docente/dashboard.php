<div class="header bg-primary pb-6 pt-4">
    <div class="container-fluid">
        <div class="header-body">
            
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">alumnos</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo $caounAlumnos?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Docentes</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo $caounDocente?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Test Tomadas</h3>
                        </div>
                        <div class="col text-right">
                            <a href="<?php echo base_url(); ?>/docente/alumnos" class="btn btn-sm btn-primary">Ver todos</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">correo</th>
                                <th scope="col">Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($alumnos as $alumno) { ?>
                            <tr>
                                <th scope="row">
                                <?php echo $alumno['nombres']." ". $alumno['apellidos']; ?> 
                                </th>
                                <td>
                                <?php echo $alumno['email'] ?> 
                                </td>
                                <td>
                                <?php echo $alumno['telefono'];?> 
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>