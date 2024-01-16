<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';
$id = $_POST['id'];
$cantidad = $_POST['cantidad'];
$fechaVencimiento = $_POST['fecha'];
$producto = $_POST['productos'];

$upd = "UPDATE stocks SET cantidad = '$cantidad', fecha_vencimiento = '$fechaVencimiento', productos_id_p = '$producto' WHERE id like '$id'";
$consulta = mysqli_query($conexion, $upd);
if (!$consulta) {
    echo "<script>alert('No se actualizo');</script>";
} else {
    echo $actualizarStocks;
}
?>