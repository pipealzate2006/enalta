<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php

include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];  
$descripcion = $_POST['descripcion']; 
$marca = $_POST['marca'];
$proveedor = $_POST['proveedor'];

$n_archivo = $_FILES['imagen']['name'];
$archivo = $_FILES['imagen']['tmp_name'];

$ruta = "../Fotos/" . $n_archivo;
$base_datos = "Fotos/" . $n_archivo;

if (!empty($n_archivo)) {
    move_uploaded_file($archivo, $ruta);
    $imagen_actualizada = ", imagen='$base_datos'";
} else {
    $imagen_actualizada = "";
}

$upd = "UPDATE productos SET nombre_producto = '$nombre', precio = '$precio'$imagen_actualizada, descripcion = '$descripcion', marcas_id = '$marca', proveedores_id = '$proveedor' WHERE id_p = '$id'";
$consulta = mysqli_query($conexion, $upd);

if (!$consulta) {
    echo "<script>alert('No se actualizo');</script>";
} else {
    echo $actualizarProductos;
}

?>