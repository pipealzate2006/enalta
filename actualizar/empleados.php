<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';
$id = $_POST['id'];
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$estado = $_POST['estado'];
$telefono = $_POST['telefono'];

$upd = "UPDATE empleados SET cedula = $cedula, nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', correo = '$correo', estado = '$estado', telefono = '$telefono' WHERE id = $id";
$consulta = mysqli_query($conexion, $upd);
if (!$consulta) {
    echo "<script>alert('No se actualizo');</script>";
} else {
    echo $actualizarEmpleados;
}

?>