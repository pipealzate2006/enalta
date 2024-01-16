<?php
session_start();

include '../conexion/conexion.php';

$rol = $_SESSION['rol'];
$usuario_actual_id = $_SESSION['id'];

if (isset($_POST['Enviar'])) {
    $sql_select_carrito = "SELECT * FROM carrito INNER JOIN usuarios ON carrito.usuarios_id = usuarios.id WHERE usuarios.id = '$usuario_actual_id'";
    $resultado_carrito = $conexion->query($sql_select_carrito);

    if ($resultado_carrito->num_rows > 0) {

        try {
            while ($fila = $resultado_carrito->fetch_assoc()) {
                $producto_id = $fila['productos_id_p'];
                $cantidad = $fila['cantidad'];
                $precio = $_POST['precio'];
                $fechaVenta = date("Y-m-d");


                $sql_insert_ventas = "INSERT INTO ventas (cantidad, fecha_venta, precio, usuarios_id, productos_id) VALUES ('$cantidad', '$fechaVenta', '$precio', '$usuario_actual_id', '$producto_id')";
                $conexion->query($sql_insert_ventas);
            }

            $sql_eliminar_carrito = "DELETE FROM carrito WHERE usuarios_id = '$usuario_actual_id'";
            $conexion->query($sql_eliminar_carrito);

            $conexion->commit();

            echo "<script>alert('Tus productos se compraron correctamente');window.location.href = '../index/index.php'</script>";
        } catch (Exception $e) {
            $conexion->rollback();
            echo "Error al registrar las ventas: " . $e->getMessage();
        }
    } else {
        echo "No hay productos en el carrito.";
    }
}
