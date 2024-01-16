<?php

session_start();

if (empty($_SESSION['id'])) {
    echo "<script>alert('Tienes que iniciar sesion en el login');window.location.href = '../login/login.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../data/datatables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../data/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="../Fotos/enaltashop.png" type="image/x-icon">
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <title>Mostrar Clientes</title>
    <style>
        #bton {
            margin-left: 150px;
            margin-top: 15px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php include '../sidebar/sidebar1.php'; ?>
    <button type="button" class="btn btn-success" id="bton" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa-solid fa-square-plus"></i> Agregar Registro de Clientes</button>
    <div class="container">
        <table id="clientes" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Accciones</th>
                </tr>
            </thead>
            <?php

            include '../conexion/conexion.php';
            $query = "SELECT * FROM clientes";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) >= 1) {
                while ($fila = mysqli_fetch_array($consulta)) { ?>
                    <tr>
                        <th><?php echo $fila['id']; ?></th>
                        <td><?php echo $fila[1]; ?></td>
                        <td><?php echo $fila[2]; ?></td>
                        <td><?php echo $fila[3]; ?></td>
                        <td><?php echo $fila[4]; ?></td>
                        <td><?php echo $fila[5]; ?></td>
                        <td><?php echo $fila[6]; ?></td>
                        <td style="text-align: center;">
                            <a href="#clientes<?php echo $fila['id']; ?>" class="btn btn-success" data-bs-toggle="modal">
                                <i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="#clientesEliminar<?php echo $fila["id"]; ?>" class="btn btn-danger" data-bs-toggle="modal" style="margin-left: 10px;"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php include '../actualizar/modal-clientes.php';
                    include '../eliminar/modal-clientes.php'; ?>
                <?php
                }
                ?>
        </table>
    <?php
            } else {
                echo "No hay resultados para esa busqueda";
            }
    ?>
    </div>
    <?php include '../sidebar/siderbar2.php'; ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo registro para Clientes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../procesoRegistros/clientes.php" class="row g-3" id="centrar">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="col-form-label">Cedula:</label>
                                <input type="number" name="cedula" class="form-control" id="recipient-name" placeholder="Ingrese su cedula">
                            </div>
                            <div class="col-md-6">
                                <label for="message-text" class="col-form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" id="recipient-name" placeholder="Ingrese su nombre">
                            </div>
                            <div class="col-md-6">
                                <label for="message-text" class="col-form-label">Apellido:</label>
                                <input type="text" name="apellido" class="form-control" id="recipient-name" placeholder="Ingrese su apellido">
                            </div>
                            <div class="col-md-6">
                                <label for="message-text" class="col-form-label">Direccion:</label>
                                <input type="text" name="direccion" class="form-control" id="recipient-name" placeholder="Ingrese su direccion de domicilio">
                            </div>
                            <div class="col-md-6">
                                <label for="message-text" class="col-form-label">Telefono:</label>
                                <input type="number" name="telefono" class="form-control" id="recipient-name" placeholder="Ingrese su telefono">
                            </div>
                            <div class="col-md-6">
                                <label for="message-text" class="col-form-label">Correo:</label>
                                <input type="email" name="correo" class="form-control" id="recipient-name" placeholder="Ingrese su correo">
                            </div>
                            <div class="col-md-6">
                                <label for="message-text" class="col-form-label">Clave:</label>
                                <input type="password" name="clave" class="form-control" id="recipient-name" placeholder="Ingrese una contraseña">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" name="Cerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="Enviar" class="btn btn-primary">Enviar</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/73c11b743b.js" crossorigin="anonymous"></script>
    <script src="../estilos/js/bootstrap.min.js"></script>
    <script src="../data/jquery/jquery-3.3.1.min.js"></script>
    <script src="../data/popper/popper.min.js"></script>
    <script src="../data/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../data/datatables/datatables.min.js"></script>
    <script src="../data/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="../data/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../data/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../data/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../data/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#clientes').DataTable({
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "sProcessing": "Procesando...",
                },
                responsive: "true",
                dom: 'Bfrtilp',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> ',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info'
                    },
                ]
            });
        });
    </script>

</body>

</html>