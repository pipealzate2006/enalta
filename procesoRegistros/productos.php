<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';

if (isset($_POST['Enviar'])) {

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$marca = $_POST['marca'];
$proveedor = $_POST['proveedor'];
$descripcion = $_POST['descripcion'];

$n_archivo = $_FILES['imagen']['name'];
$archivo = $_FILES['imagen']['tmp_name'];

$ruta = "../Fotos/" . $n_archivo;
$base_datos = "Fotos/" . $n_archivo;

move_uploaded_file($archivo, $ruta);

    $query = "INSERT INTO productos (nombre_producto, precio, imagen, descripcion, marcas_id, proveedores_id) VALUES ('$nombre', '$precio', '$base_datos', '$descripcion', '$marca', '$proveedor')";
    $consulta = mysqli_query($conexion, $query);
    if ($consulta) {
        echo $registrarProductos;
}
}
?>