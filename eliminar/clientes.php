<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';

$id = $_GET['id'];
$eliminar = "DELETE FROM clientes WHERE id like $id";
$consulta = mysqli_query($conexion, $eliminar);

if (!$consulta) {
    echo "<script>alert('No se elimino');</script>";
} else {
    echo $eliminarClientes;
}
?>