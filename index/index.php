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

include '../conexion/conexion.php';

$query1 = "SELECT * FROM productos";
$consulta1 = mysqli_query($conexion, $query1);

$query = "SELECT * FROM productos INNER JOIN marcas ON productos.marcas_id = marcas.id";
$consulta = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="../Fotos/enaltashop.png" type="image/x-icon">
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&family=Titillium+Web:wght@200;300;400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans';
        }

        .swiper .swiper-slide {
            height: 100vh;
            display: flex;
            margin-top: 100px;
            justify-content: center;
            align-items: center;
            background-position: center;
            background-size: cover;
            width: 350px;
            height: 350px;
        }

        .contenedor {
            max-width: 1200px;
            padding: 10px;
            margin: auto;
            display: flex;
            justify-content: center;
            contain: paint;
        }

        .contenedor .contenedor-items {
            margin-top: 70px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            transition: .3s;
        }

        .contenedor .contenedor-items .item {
            max-width: 200px;
            margin: 10px;
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

        .bolsa {
            position: absolute;
            top: 70px;
            right: 10px;
            padding: 10px;
        }

        /* SECCION RESPONSIVE */
        @media screen and (max-width: 768px) {
            .titulo-item {
                padding: 0;
                margin: 0;
                height: 45px;
            }

            .item {
                width: 28%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php while ($imagen = mysqli_fetch_array($consulta1)) { ?>
                    <div class="swiper-slide" style="background-image: url('../<?php echo $imagen['imagen']; ?>')"></div>
                <?php } ?>
            </div>
        </div>
        <section class="contenedor">
            <div class="contenedor-items">
                <?php while ($productos = mysqli_fetch_array($consulta)) { ?>
                    <div class="item">
                        <span class="titulo-item"><?php echo $productos[1]; ?></span>
                        <a href="../compras/carrito.php?imagen=<?php echo $productos[0]; ?>">
                            <img src="../<?php echo $productos['imagen']; ?>" class="img-item">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 3,
            speed: 600,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
        });
    </script>
    <?php include '../sidebar/footer.php'; ?>
    <script src="../estilos/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/73c11b743b.js" crossorigin="anonymous"></script>
</body>

</html>