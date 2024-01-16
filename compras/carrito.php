<?php
session_start();

if (empty($_SESSION['id'])) {
    $usuario_actual_id = 0;
    include '../sidebar/navbar2.php';
} else {
    if (isset($_SESSION['id']) && isset($_SESSION['rol'])) {
        $rol = $_SESSION['rol'];
        $usuario_actual_id = $_SESSION['id'];

        if ($rol == 1) {
            header("location: ../registros/cantidad.php");
            exit();
        } else {
            include '../sidebar/navbar1.php';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../Fotos/enaltashop.png" type="image/x-icon">
    <title>Compras</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

        .imagen {
            display: flex;
            margin: 80px;
            overflow: hidden;
        }

        .informacion {
            float: right;
            width: 500px;
            margin-right: 230px;
            margin-top: 90px;
        }

        h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 34px;
            line-height: 1.2;
            color: #000;
            margin-top: 0;
            margin-bottom: 10px;
        }

        h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 26px;
            line-height: 1.2;
            color: #000;
            margin-top: 0;
            margin-bottom: 30px;
        }

        h4 span {
            text-decoration: line-through;
            font-size: 20px;
            opacity: 0.6;
            padding-left: 15px;
        }

        .section-fluid {
            position: relative;
            width: 100%;
            display: block;
        }

        [type="radio"]:checked,
        [type="radio"]:not(:checked) {
            position: absolute;
            visibility: hidden;
        }

        .desc-btn:checked+label,
        .desc-btn:not(:checked)+label {
            position: relative;
            transition: all 200ms linear;
            display: inline-block;
            border: none;
            cursor: pointer;
            color: #000;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 18px;
            line-height: 1.2;
            color: #000;
            margin-right: 25px;
            opacity: 0.5;
        }

        .desc-btn:checked+label {
            opacity: 1;
        }

        .desc-sec {
            padding-top: 20px;
            padding-bottom: 30px;
            transition: all 250ms linear;
            opacity: 0;
            overflow: hidden;
            pointer-events: none;
            transform: translateY(20px);
        }

        .desc-sec.accor-2 {
            position: absolute;
            top: 25px;
            left: 0;
            width: 100%;
            z-index: 2;
        }

        #desc-1:checked~.desc-sec.accor-1 {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        #desc-2:checked~.desc-sec.accor-2 {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        .contenedor .contenedor-items .item {
            max-width: 200px;
            margin: auto;
            border: 1px solid #666;
            border-radius: 10px;
            padding: 20px;
            transition: .3s;
            margin-bottom: 10px;
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

        .name {
            border: none;
        }

        .bolsa {
            position: absolute;
            top: 70px;
            right: 10px;
            padding: 10px;
        }

        @media screen and (max-width: 1283px) {
            .imagen {
                display: block;
                justify-content: center;
                width: 35%;
            }

            .informacion {
                display: block;
                justify-content: center;
                width: 180px;
                transform: translateY(60px);
            }


        }

        @media screen and (max-width: 1024px) {
            .informacion {
                display: block;
                transform: translateY(60px);
            }
        }

        @media screen and (max-width: 850px) {
            .imagen {
                display: block;
                justify-content: center;
                width: auto;
                margin-top: 70px;
            }

            .informacion {
                transform: translateX(420px);
            }
        }

        @media screen and (max-width: 768px) {
            .col-md-4 {
                margin-top: 10px;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }

            .contenedor .contenedor-items .item .img-item {
                border-radius: 20px 20px 20px 20px;
            }
        }
    </style>
</head>

<body>
    <?php include '../conexion/conexion.php';
    if (isset($_GET['imagen'])) {
        $imagen = $_GET['imagen'];
        $query = "SELECT * FROM productos INNER JOIN marcas ON productos.marcas_id = marcas.id WHERE productos.id_p = '$imagen'";
        $consulta = mysqli_query($conexion, $query);
        while ($productos = mysqli_fetch_array($consulta)) { ?>
            <div class="container">
                <form action="../compras/proceso-carrito.php" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="hidden" name="nombre" value="<?php echo $productos[0]; ?>">
                            <div class="imagen">
                                <img src="../<?php echo $productos['imagen']; ?>" alt="" style="width: 400px; border-radius: 50px 50px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="informacion">
                                <h1><?php echo $productos[1]; ?></h1>
                                <h4><input type="text" class="name" name="precio" value="<?php echo "$" . $productos['precio']; ?>" readonly><span>500000</span></h4>
                                <div class="section-fluid">
                                    <input class="desc-btn" type="radio" id="desc-1" name="desc-btn" checked />
                                    <label for="desc-1">Descripción</label>
                                    <input class="desc-btn" type="radio" id="desc-2" name="desc-btn" />
                                    <label for="desc-2">Marca</label>
                                    <div class="section-fluid desc-sec accor-1">
                                        <p><?php echo $productos[4]; ?></p>
                                    </div>
                                    <label>Selecciona la cantidad:
                                        <div class="selector-cantidad">
                                            <i class="fa-solid fa-plus" onclick="aumentarCantidad()" style="cursor: pointer;"></i>
                                            <input type="number" id="cantidad" name="cantidad" value="1" style="border: none; outline: none; text-align: center; width: 40px;" readonly>
                                            <i class="fa-solid fa-minus" onclick="disminuirCantidad()" style="cursor: pointer;"></i>
                                        </div>Cantidad disponible: <?php
                                                                    $q = "SELECT cantidad FROM stocks WHERE productos_id_p = '$imagen'";
                                                                    $c = mysqli_query($conexion, $q);
                                                                    while ($stocks = mysqli_fetch_array($c)) {
                                                                        echo $stocks['cantidad'];
                                                                    }  ?>
                                    </label>
                                    <div class="section-fluid desc-sec accor-2">
                                        <div class="section-inline">
                                            <p><span><?php echo $productos['nombre_marca']; ?></span></p>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-danger" name="Enviar">
                                    <i class="fa-solid fa-cart-shopping"></i> Agregar al carrito
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bolsa">
                <?php
                $sql = "SELECT COUNT(*) as total FROM carrito WHERE usuarios_id = '$usuario_actual_id'";
                $resultado = mysqli_query($conexion, $sql);
                $fila = mysqli_fetch_assoc($resultado);

                if ($fila['total'] > 0) {
                ?>
                    <a class="btn btn-info" href="../compras/compras.php?id=<?php echo $usuario_actual_id; ?>">
                        <i class="fa-solid fa-bag-shopping"></i>
                        (<?php echo $fila['total']; ?>)
                    </a>
                <?php
                }
                ?>
            </div>
    <?php
        }
    } ?>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['imagen'])) {
                $imagen = $_GET['imagen'];
                $query1 = "SELECT * FROM productos INNER JOIN marcas ON productos.marcas_id = marcas.id WHERE productos.id_p <> '$imagen'";
                $consulta1 = mysqli_query($conexion, $query1);

                while ($card = mysqli_fetch_array($consulta1)) {
            ?>
                    <div class="col-md-4">
                        <section class="contenedor">
                            <div class="contenedor-items">
                                <div class="item">
                                    <span class="titulo-item"><?php echo $card[1]; ?></span>
                                    <a href="../compras/carrito.php?imagen=<?php echo $card[0]; ?>">
                                        <img src="../<?php echo $card['imagen']; ?>" class="img-item">
                                    </a>
                                </div>
                            </div>
                        </section>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <?php include '../sidebar/footer.php'; ?>
    <script src="../estilos/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/73c11b743b.js" crossorigin="anonymous"></script>
    <script>
        function aumentarCantidad() {
            var cantidadInput = document.getElementById("cantidad");
            var cantidad = parseInt(cantidadInput.value);
            cantidadInput.value = cantidad + 1;
        }

        function disminuirCantidad() {
            var cantidadInput = document.getElementById("cantidad");
            var cantidad = parseInt(cantidadInput.value);
            if (cantidad > 1) {
                cantidadInput.value = cantidad - 1;
            }
        }
    </script>
</body>

</html>