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
    <title>Mostrar stocks</title>
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

    $queryProductos = "SELECT * FROM productos";
    $consulta_productos = mysqli_query($conexion, $queryProductos);

    ?>
    <button type="button" class="btn btn-success" id="bton" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa-solid fa-square-plus"></i> Agregar Registro de Stocks</button>
    <div class="container">
        <table id="stocks" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha de vencimiento</th>
                    <th>Accciones</th>
                </tr>
            </thead>
            <?php

            include '../conexion/conexion.php';
            $query = "SELECT * FROM stocks INNER JOIN productos ON stocks.productos_id_p = productos.id_p";
            $consulta = mysqli_query($conexion, $query);

            if (mysqli_num_rows($consulta) >= 1) {
                while ($fila = mysqli_fetch_array($consulta)) { ?>
                    <tr>
                        <th><?php echo $fila[0]; ?></th>
                        <td><?php echo $fila['nombre_producto']; ?></td>
                        <td><?php echo $fila[1]; ?></td>
                        <td><?php echo $fila[2]; ?></td>
                        <td style="text-align: center;">
                            <a href="#stocks<?php echo $fila[0]; ?>" class="btn btn-success" data-bs-toggle="modal">
                                <i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="#stocksEliminar<?php echo $fila[0]; ?>" class="btn btn-danger" data-bs-toggle="modal" style="margin-left: 10px;"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php include '../actualizar/modal-stocks.php';
                    include '../eliminar/modal-stocks.php'; ?>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo registro para Stocks</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../procesoRegistros/stocks.php" class="row g-3" id="centrar">
                        <div class="row">

                            <div class="col-6">
                                <label for="message-text" class="col-form-label">Selecciona el Producto:</label>
                                <select class="form-select" aria-label="Default select example" name="producto">
                                    <option selected value="">Selecciona el producto</option>
                                    <?php
                                    while ($productos = mysqli_fetch_array($consulta_productos)) {
                                        echo "<option value=" . $productos[0] . ">" . $productos[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="col-form-label">Cantidad:</label>
                                <input type="number" name="cantidad" class="form-control" id="recipient-name" placeholder="Ingrese la cantidad del producto">
                            </div>
                            <div class="col-md-6">
                                <label for="message-text" class="col-form-label">Fecha de Vencimiento:</label>
                                <input type="date" name="fechaVencimiento" class="form-control" id="recipient-name" placeholder="Ingrese la fecha de vencimiento">
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
            $('#stocks').DataTable({
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