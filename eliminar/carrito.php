<?php
session_start();
$usuario_actual_id = $_SESSION['id'];

include '../conexion/conexion.php';

// Verifica si el parámetro 'id' está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $cantidadQuery = "SELECT cantidad FROM carrito WHERE productos_id_p = '$id'";
    $consultaCantidad = mysqli_query($conexion, $cantidadQuery);
    while ($cantidad = mysqli_fetch_assoc($consultaCantidad)) {
        $cantidadTotal = $cantidad['cantidad'];
    }

    $eliminar = "DELETE FROM carrito WHERE productos_id_p = '$id'";
    $consultaEliminar = mysqli_query($conexion, $eliminar);

    if ($consultaEliminar) {
        $actualizarCantidad = "UPDATE stocks SET cantidad = cantidad + '$cantidadTotal' WHERE productos_id_p = '$id'";
        $actualizarConsulta = mysqli_query($conexion, $actualizarCantidad);
        header("location: ../compras/compras.php?id=$usuario_actual_id");
    } else {
        echo "<script>alert('No se eliminó');</script>";
    }
} else {
    echo "<script>alert('ID no proporcionado');</script>" . $id;
}
?>