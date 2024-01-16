<?php

session_start();

if (empty($_SESSION['id'])) {
    echo "<script>alert('Tienes que iniciar sesion en el login');window.location.href = '../login/login.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Fotos/enaltashop.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cantidad De Registros</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&family=Titillium+Web:wght@200;300;400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans';
        }

        .contenedor {
            max-width: 1200px;
            padding: 10px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            /* oculto lo que queda fuera del .contenedor */
            contain: paint;
        }

        /* SECCION CONTENEDOR DE ITEMS */
        .contenedor .contenedor-items {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            grid-gap: 30px;
            grid-row-gap: 30px;
            /* width: 60%; */
            width: 100%;
            transition: .3s;
        }

        .contenedor .contenedor-items .item {
            max-width: 200px;
            margin: auto;
            border: 1px solid #666;
            border-radius: 10px;
            padding: 20px;
            transition: .3s;
        }

        .contenedor .contenedor-items .item .img-item {
            width: 100%;
            transition: transform 0.4s ease-in-out;
            border-radius: 10px 20px 30px 40px;
            border-color: #000;
        }

        .contenedor .contenedor-items .item .img-item:hover {
            box-shadow: 0 0 10px #666;
            transform: scale(1.01);
        }

        .contenedor .contenedor-items .item .titulo-item {
            display: block;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }

        /* SECCION RESPONSIVE */
        @media screen and (max-width: 850px) {
            .contenedor {
                display: block;
            }

            .contenedor-items {
                width: 100% !important;
            }

            .carrito {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php include '../sidebar/sidebar1.php';
    include '../conexion/conexion.php'; ?>
    <section class="contenedor">
        <div class="contenedor-items">
            <div class="item">
                <span class="titulo-item">Clientes</span>
                <a href="../mostrar/clientes.php"><img src="../Fotos/clientes.jpg" alt="" class="img-item"></a>
                <span class="titulo-item"><?php $sql = "SELECT COUNT(*) total FROM clientes";
                                            $resultado = mysqli_query($conexion, $sql);
                                            $fila = mysqli_fetch_assoc($resultado);
                                            echo "Total es: " . $fila['total']; ?></span>
            </div>
            <div class="item">
                <span class="titulo-item">Empleados</span>
                <a href="../mostrar/empleados.php"><img src="../Fotos/empleados.jpg" alt="" class="img-item"></a>
                <span class="titulo-item"><?php $sql = "SELECT COUNT(*) total FROM empleados";
                                            $resultado = mysqli_query($conexion, $sql);
                                            $fila = mysqli_fetch_assoc($resultado);
                                            echo "Total es: " . $fila['total']; ?></span>
            </div>
            <div class="item">
                <span class="titulo-item">Marcas</span>
                <a href="../mostrar/marcas.php"><img src="../Fotos/marcas.png" alt="" class="img-item"></a>
                <span class="titulo-item"><?php $sql = "SELECT COUNT(*) total FROM marcas";
                                            $resultado = mysqli_query($conexion, $sql);
                                            $fila = mysqli_fetch_assoc($resultado);
                                            echo "Total es: " . $fila['total']; ?></span>
            </div>
            <div class="item">
                <span class="titulo-item">Productos</span>
                <a href="../mostrar/productos.php"><img src="../Fotos/productos.jpg" alt="" class="img-item"></a>
                <span class="titulo-item"><?php $sql = "SELECT COUNT(*) total FROM productos";
                                            $resultado = mysqli_query($conexion, $sql);
                                            $fila = mysqli_fetch_assoc($resultado);
                                            echo "Total es: " . $fila['total']; ?></span>
            </div>
            <div class="item">
                <span class="titulo-item">Proveedores</span>
                <a href="../mostrar/proveedores.php"><img src="../Fotos/proveedores.png" alt="" class="img-item"></a>
                <span class="titulo-item"><?php $sql = "SELECT COUNT(*) total FROM proveedores";
                                            $resultado = mysqli_query($conexion, $sql);
                                            $fila = mysqli_fetch_assoc($resultado);
                                            echo "Total es: " . $fila['total']; ?></span>
            </div>
            <div class="item">
                <span class="titulo-item">Stocks</span>
                <a href="../mostrar/stocks.php"><img src="../Fotos/stocks.webp" alt="" class="img-item"></a>
                <span class="titulo-item"><?php $sql = "SELECT COUNT(*) total FROM stocks";
                                            $resultado = mysqli_query($conexion, $sql);
                                            $fila = mysqli_fetch_assoc($resultado);
                                            echo "Total es: " . $fila['total']; ?></span>
            </div>
            <div class="item">
                <span class="titulo-item">Usuarios</span>
                <img src="../Fotos/usuarios.jpg" alt="" class="img-item">
                <span class="titulo-item"><?php $sql = "SELECT COUNT(*) total FROM usuarios";
                                            $resultado = mysqli_query($conexion, $sql);
                                            $fila = mysqli_fetch_assoc($resultado);
                                            echo "Total es: " . $fila['total']; ?></span>
            </div>
            <div class="item">
                <span class="titulo-item">Ventas</span>
                <a href="../mostrar/ventas.php"><img src="../Fotos/ventas.png" alt="" class="img-item"></a>
                <span class="titulo-item"><?php $sql = "SELECT COUNT(*) total FROM ventas";
                                            $resultado = mysqli_query($conexion, $sql);
                                            $fila = mysqli_fetch_assoc($resultado);
                                            echo "Total es: " . $fila['total']; ?></span>
            </div>
        </div>
    </section>
    <?php include '../sidebar/siderbar2.php'; ?>
</body>

</html>