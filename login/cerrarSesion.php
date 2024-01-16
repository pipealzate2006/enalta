<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
include '../sweetalert.php/sweetalert.php';

session_start();
session_destroy();
echo $cerrarSesion;
?>