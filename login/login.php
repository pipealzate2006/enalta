<?php
include '../sweetalert.php/sweetalert.php';
include '../conexion/conexion.php';

session_start();

if (isset($_POST['Enviar'])) {
    if (!empty($_POST['correo']) && !empty($_POST['clave'])) {
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ? AND clave = ?");
        $stmt->bind_param("ss", $correo, $md5);

        $md5 = md5($clave);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($datos = $result->fetch_object()) {
            $_SESSION['id'] = $datos->id;
            $_SESSION['nombre'] = $datos->nombre;
            $_SESSION['apellido'] = $datos->apellido;
            $_SESSION['correo'] = $datos->correo;
            $_SESSION['rol'] = $datos->rol;
            header("location: ../index/index.php");
        } else {
            echo "<script>alert('Acceso denegado');window.location.href = '../login/login.html'</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Los campos están vacíos, debes llenarlos'); window.location.href = '../login/login.html';</script>";
    }
}
