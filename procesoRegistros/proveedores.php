<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';

if (isset($_POST['Enviar'])) {

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $query = "INSERT INTO proveedores (cedula, nombre, apellido, direccion, telefono, correo) VALUES ('$cedula', '$nombre', '$apellido', '$direccion','$telefono','$correo')";
    $consulta = mysqli_query($conexion, $query);
    if ($consulta) {
        echo $registrarProveedores;
    }
}
?>