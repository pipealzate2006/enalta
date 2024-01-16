<?php
session_start();

if (empty($_SESSION['id'])) {
    $usuario_actual_id = 0;
    include '../sidebar/navbar2.php';
} else {
    if (isset($_SESSION['id']) && isset($_SESSION['rol'])) {
        $rol = $_SESSION['rol'];
        $usuario_actual_id = $_SESSION['id'];

        if ($rol == 1) {
            header("location: ../registros/cantidad.php");
            exit();
        } else {
            include '../sidebar/navbar1.php';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../Fotos/enaltashop.png" type="image/x-icon">
    <title>Compras</title>
    <style>
        table {
            margin-top: 70px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    ?>
        <div class="container">
            <form action="../compras/proceso-ventas.php" method="post">
                <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="table-dark">
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <?php
                    include '../conexion/conexion.php';
                    $sql = "SELECT * FROM carrito INNER JOIN productos ON carrito.productos_id_p = productos.id_p INNER JOIN usuarios ON carrito.usuarios_id = usuarios.id WHERE usuarios.id = '$usuario_actual_id'";
                    $consulta = mysqli_query($conexion, $sql);

                    $total_precio = 0;

                    if (mysqli_num_rows($consulta) >= 1) {
                        while ($fila = mysqli_fetch_array($consulta)) {
                            $total_precio += $fila['precio'];
                    ?>
                            <tr>
                                <td><?php echo $fila['nombre_producto']; ?></td>
                                <td><?php echo $fila[1]; ?></td>
                                <td><input type="text" name="precio" value="<?php echo $fila['precio']; ?>" readonly style="border: none;"></td>
                                <td><?php echo $fila['descripcion']; ?></td>
                                <td style="text-align: center;">
                                    <a href="../eliminar/carrito.php?id=<?php echo $fila['id_p']; ?>" class="btn btn-danger" data-bs-toggle="modal">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="2"></td>
                            <td><b><?php echo "$" . $total_precio; ?></b></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr>
                            <td colspan="5">No hay elementos en el carrito.</td>
                        </tr>
                <?php
                    }
                }
                ?>
                </table>
                <button type="submit" class="btn btn-success" name="Enviar">Pagar</button>
            </form>
            <!-- ... (código posterior) ... -->

        </div>
        <script src="https://kit.fontawesome.com/73c11b743b.js" crossorigin="anonymous"></script>
        <script src="../estilos/js/bootstrap.min.js"></script>
</body>

</html>