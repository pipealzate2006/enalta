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
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];
    $telefono = $_POST['telefono'];
    $clave = $_POST['clave'];

    $md5 = md5($clave);

    $empleados = "SELECT correo FROM empleados WHERE correo = '$correo'";
    $queryEmpleados = mysqli_query($conexion, $empleados);

    if ($queryEmpleados->num_rows > 0) {
        echo "<script>alert('El correo ya existe, ingresa otro');window.location.href = '../login/login.html'</script>";
    } else {
        $query = "INSERT INTO empleados(cedula, nombre, apellido, direccion, correo, estado, telefono, clave)  VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$correo', '$estado', '$telefono', '$md5')";
        $consulta = mysqli_query($conexion, $query);
        if ($consulta) {
            echo $registrarEmpleados;
            $q = "INSERT INTO usuarios(cedula, nombre, apellido, correo, rol, clave) VALUES ('$cedula', '$nombre', '$apellido', '$correo', '2', '$md5')";
            $c = mysqli_query($conexion, $q);

            if ($c) {
            }
        }
    }
}
?>