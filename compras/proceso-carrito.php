<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
session_start();

if (empty($_SESSION['id'])) {
    echo "<script>alert('Tienes que iniciar sesión en el login');window.location.href = '../login/login.html'</script>";
}

$rol = $_SESSION['rol'];
$usuario_actual_id = $_SESSION['id'];

if ($rol == 1) {
    header("location: ../registros/cantidad.php");
}

include '../sweetalert.php/sweetalert.php';
include '../conexion/conexion.php';

if (isset($_POST['Enviar'])) {
    $cantidad = $_POST['cantidad'];
    $productos = $_POST['nombre'];
    $cliente = $_SESSION['id'];

    $sql = "SELECT cantidad FROM stocks WHERE productos_id_p = '$productos'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $cantidadStocks = $row['cantidad'];

        if ($cantidad > $cantidadStocks) {
            echo "<script>alert('No hay suficiente cantidad en stocks');</script>";
        } else {
            $sql = "INSERT INTO carrito(cantidad, productos_id_p, usuarios_id) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);

            $stmt->bind_param("iii", $cantidad, $productos, $cliente);

            if ($cantidadStocks > 0) {
                if ($stmt->execute()) {
                    $query = "UPDATE stocks SET cantidad = cantidad - '$cantidad' WHERE productos_id_p = '$productos'";
                    $consulta = mysqli_query($conexion, $query);
                    header("location: ../index/index.php");
                } else {
                    echo "datos no insertados";
                }
            } else {
                echo "<script>alert('No hay más productos en inventario');</script>";
            }
        }
    }
}

?>