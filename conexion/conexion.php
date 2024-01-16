<?php
$conexion = new mysqli("localhost", "root", "", "id21795689_enaltashop30");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
} 
?>