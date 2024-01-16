<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';

if (isset($_POST['Enviar'])) {

    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fechaVencimiento'];
    $productos = $_POST['producto'];

    $query = "INSERT INTO `stocks`(`cantidad`, `fecha_vencimiento`, `productos_id_p`) VALUES ('$cantidad', '$fecha', '$productos')";
    $consulta = mysqli_query($conexion, $query);
    if ($consulta){
        echo $registrarStocks;
    }
}
