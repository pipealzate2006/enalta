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
    <link rel="shortcut icon" href="../Fotos/enaltashop.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../data/datatables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../data/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <title>Mostrar productos</title>
    <style>
        #bton {
            margin-left: 150px;
            margin-top: 15px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php include '../sidebar/sidebar1.php';
    include '../conexion/conexion.php';

    $queryMarcas = "SELECT * FROM marcas";
    $consulta_marcas = mysqli_query($conexion, $queryMarcas);

    $query_proveedores = "SELECT * FROM proveedores";
    $consulta_proveedores = mysqli_query($conexion, $query_proveedores);
    ?>
    <button type="button" class="btn btn-success" id="bton" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa-solid fa-square-plus"></i> Agregar Registro de Productos</button>
    <div class="container">
        <table id="productos" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Proveedor</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Accciones</th>
                </tr>
            </thead>
            <?php
            $query = "SELECT * FROM productos INNER JOIN marcas ON productos.marcas_id = marcas.id INNER JOIN proveedores ON productos.proveedores_id = proveedores.id";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) >= 1) {
                while ($fila = mysqli_fetch_array($consulta)) { ?>
                    <tr>
                        <th><?php echo $fila[0]; ?></th>
                        <td><?php echo $fila[1]; ?></td>
                        <td><?php echo $fila['nombre'] . " " . $fila['apellido']; ?></td>
                        <td><?php echo $fila['nombre_marca']; ?></td>
                        <td><?php echo "$" . $fila['precio']; ?></td>
                        <td><img src="../<?php echo $fila[3]; ?>" width="70px"></td>
                        <td><?php echo $fila[4]; ?></td>
                        <td style="text-align: center;">
                            <a href="#productos<?php echo $fila[0]; ?>" class="btn btn-success" data-bs-toggle="modal" id="btn">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="#productosEliminar<?php echo $fila[0]; ?>" class="btn btn-danger" data-bs-toggle="modal" id="btn" style="margin-left: 10px;">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php include '../eliminar/modal-productos.php';
                    include '../actualizar/modal-productos.php'; ?>
                <?php
                }
                ?>
        </table>
    <?php
            } else {
                echo "No hay resultados para esa busqueda";
            }
    ?>
    <?php include '../sidebar/siderbar2.php'; ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo registro para Productos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../procesoRegistros/productos.php" class="row g-3" id="centrar" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="message-text" class="col-form-label">Nombre del producto:</label>
                                <input type="text" required name="nombre" class="form-control" id="recipient-name" placeholder="Ingrese el nombre del producto">
                            </div>
                            <div class="col-md-6">
                                <label for="message-text" class="col-form-label">Precio:</label>
                                <input type="number" required name="precio" class="form-control" id="recipient-name" placeholder="Ingrese el precio">
                            </div>
                            <div class="col-md-6">
                                <label for="inputZip" class="form-label">Imagen:</label>
                                <input type="file" class="form-control" name="imagen" id="inputZip" placeholder="Ingrese una imagen de la tienda">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripción:</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"></textarea>
                            </div>
                            <div class="col-6">
                                <label for="message-text" class="col-form-label">Selecciona la Marca:</label>
                                <select class="form-select" aria-label="Default select example" name="marca">
                                    <option selected value="">Selecciona la marca</option>
                                    <?php
                                    while ($marcas = mysqli_fetch_array($consulta_marcas)) {
                                        echo "<option value=" . $marcas[0] . ">" . $marcas[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="message-text" class="col-form-label">Selecciona el Proveedor:</label>
                                <select class="form-select" aria-label="Default select example" name="proveedor">
                                    <option selected value="">Selecciona el proveedor</option>
                                    <?php
                                    while ($proveedor = mysqli_fetch_array($consulta_proveedores)) {
                                        echo "<option value=" . $proveedor[0] . ">" . $proveedor[2] . " " . $proveedor[3] . "</option>";
                                    }
                                    ?>
                                </select>
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
            $('#productos').DataTable({
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