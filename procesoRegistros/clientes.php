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
    $email = $_POST['correo'];
    $clave = $_POST['clave'];

    $md5 = md5($clave);

    $clientes = "SELECT correo FROM clientes WHERE correo = '$email'";
    $queryClientes = mysqli_query($conexion, $clientes);

    if ($queryClientes->num_rows > 0) {
        echo "<script>alert('El correo ya existe, ingresa otro');window.location.href = '../login/login.html'</script>";
    } else {
        $query = "INSERT INTO `clientes`(`cedula`, `nombre_clientes`, `apellido`, `direccion`, `telefono`, `correo`, `clave`) VALUES ('$cedula','$nombre','$apellido','$direccion','$telefono','$email', '$md5')";
        $consulta = mysqli_query($conexion, $query);
        if ($consulta) {
            echo $registrarClientes;
            $q = "INSERT INTO usuarios(cedula, nombre, apellido, correo, rol, clave) VALUES ('$cedula', '$nombre', '$apellido', '$email', '3', '$md5')";
            $c = mysqli_query($conexion, $q);

            if ($c) {
            }
        }
    }
}
?>