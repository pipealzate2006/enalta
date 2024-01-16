<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';

if (isset($_POST['Enviar'])) {
    $nombre = $_POST['marca'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO `marcas`(`nombre_marca`, `descripcion`) VALUES ('$nombre', '$descripcion')";
    $consulta = mysqli_query($conexion, $query);
    if ($consulta) {
        echo $registrarMarcas;
    }
}
?>