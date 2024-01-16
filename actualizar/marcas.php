<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';
$id = $_POST['id'];
$nombre = $_POST['marca'];
$descripcion = $_POST['descripcion'];

$upd = "UPDATE marcas SET nombre_marca = '$nombre', descripcion = '$descripcion' WHERE id like $id";
$consulta = mysqli_query($conexion, $upd);
if (!$consulta) {
    echo "<script>alert('No se actualizo');</script>";
} else {
    echo $actualizarMarcas;
} 

?>