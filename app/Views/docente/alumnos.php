<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0"><?php echo $titulo; ?></h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/dashboard"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a><?php echo $titulo; ?></a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <!-- <a href="#" class="btn btn-sm btn-neutral">New</a> -->
                    <a href="<?php echo base_url(); ?>/ventas/eliminados" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i> Eliminados</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <!-- <div class="card-header border-0">
              <h3 class="mb-0">Light table</h3>
            </div> -->
                <!-- Light table -->
                <div class="table-responsive mt-4 p-4">
                    <table class="table table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Fechas</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>telefono</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($alumnos as $alumno) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $alumno['fecha_edit']; ?> </td>
                                    <td><?php echo $alumno['nombres']; ?> </td>
                                    <td><?php echo $alumno['apellidos']; ?> </td>
                                    <td><?php echo $alumno['telefono']; ?> </td>
                                    <td><?php echo $alumno['email']; ?> </td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url() . '/ventas/muestraTicketPdf/' . $alumno['id']; ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-list-alt"></i>
                                        </a>
                                        <a href="#" data-href="<?php echo base_url() . '/ventas/eliminar/' . $alumno['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>

                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>