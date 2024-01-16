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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conocenos</title>
    <link rel="shortcut icon" href="../Fotos/enaltashop.png" type="image/x-icon">
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'open sans';
        }

        .contenedor {
            padding: 60px 0;
            width: 90%;
            max-width: 1000px;
            margin: auto;
            overflow: hidden;
        }

        .titulo {
            color: #642a73;
            font-size: 30px;
            text-align: center;
            margin-bottom: 60px;
        }

        /* Header */

        header {
            width: 100%;
            height: 600px;
            background: #070D1F;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, rgba(7, 13, 31, 0.459), rgba(7, 13, 31, 0.664)), url(../Fotos/9900.png);
            background: linear-gradient(to right, rgba(7, 13, 31, 0.459), rgba(7, 13, 31, 0.664)), url(../Fotos/9900.png);
            background-size: cover;
            background-attachment: fixed;
            position: relative;
        }

        header .textos-header {
            display: flex;
            height: 430px;
            width: 100%;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .textos-header h1 {
            font-size: 50px;
            color: #fff;
        }

        .textos-header h2 {
            font-size: 30px;
            font-weight: 300;
            color: #fff;
        }

        .wave {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        /* About us */

        main .sobre-nosotros {
            padding: 30px 0 60px 0;
        }

        .contenedor-sobre-nosotros {
            display: flex;
            justify-content: space-evenly;
        }

        .imagen-about-us {
            width: 48%;
        }

        .sobre-nosotros .contenido-textos {
            width: 48%;
        }

        .contenido-textos h3 {
            margin-bottom: 15px;
        }

        .contenido-textos h3 span {
            background: #070D1F;
            color: #fff;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            width: 30px;
            height: 30px;
            padding: 2px;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
            margin-right: 5px;
        }

        .contenido-textos p {
            padding: 0px 0px 30px 15px;
            font-weight: 300;
            text-align: justify;
        }

        /* Galeria */


        .portafolio {
            background: #f2f2f2;
        }

        .galeria-port {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .imagen-port {
            width: 24%;
            margin-bottom: 10px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
        }

        .imagen-port>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hover-galeria {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            transform: scale(0);
            background: hsla(273, 91%, 27%, 0.7);
            transition: transform .5s;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .hover-galeria img {
            width: 50px;
        }

        .hover-galeria p {
            color: #fff;
        }

        .imagen-port:hover .hover-galeria {
            transform: scale(1);
        }

        /* Clients */

        .cards {
            display: flex;
            justify-content: space-evenly;
        }

        .cards .card {
            background: #070D1F;
            display: flex;
            width: 46%;
            height: 200px;
            align-items: center;
            justify-content: space-evenly;
            border-radius: 5px;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.6);
        }

        .cards .card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 3px solid #fff;
            border-radius: 50%;
            display: block;
        }

        .cards .card>.contenido-texto-card {
            width: 60%;
            color: #fff;
        }

        .cards .card>.contenido-texto-card p {
            font-weight: 300;
            padding-top: 5px;
        }

        /*  Our team */

        .about-services {
            background: #f2f2f2;
            padding-bottom: 30px;
        }


        .servicio-cont {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .servicio-ind {
            width: 28%;
            text-align: center;
        }

        .servicio-ind img {
            width: 90%;
        }

        .servicio-ind h3 {
            margin: 10px 0;
        }

        .servicio-ind p {
            font-weight: 300;
            text-align: justify;
        }

        @media screen and (max-width:900px) {
            header {
                background-position: center;
            }

            .contenedor-sobre-nosotros {
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .sobre-nosotros .contenido-textos {
                width: 90%;
            }

            .imagen-about-us {
                width: 90%;
            }

            /* Galeria */

            .imagen-port {
                width: 44%;
            }

            /* Clientes */

            .cards {
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .cards .card {
                width: 90%;
            }

            .cards .card:first-child {
                margin-bottom: 30px;
            }

            /* servicios */

            .servicio-cont {
                justify-content: center;
                flex-direction: column;
            }

            .servicio-ind {
                width: 100%;
                text-align: center;
            }

            .servicio-ind:nth-child(1),
            .servicio-ind:nth-child(2) {
                margin-bottom: 60px;
            }

            .servicio-ind img {
                width: 90%;
            }
        }

        @media screen and (max-width:500px) {
            .textos-header h1 {
                font-size: 35px;
            }

            .textos-header h2 {
                font-size: 20px;
            }

            /* ABOUT US */

            .imagen-about-us {
                margin-bottom: 60px;
                width: 99%;
            }

            .sobre-nosotros .contenido-textos {
                width: 95%;
            }

            /* Galeria */

            .imagen-port {
                width: 95%;
            }

            /* Clients */

            .cards .card {
                height: 450px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .cards .card img {
                width: 90px;
                height: 90px;
            }

            .content-foo {
                margin-bottom: 20px;
                text-align: center;
            }

            .content-foo h4 {
                border: none;
            }

            .content-foo p {
                color: #ccc;
                border-bottom: 1px solid #f2f2f2;
                padding-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <header>
        <section class="textos-header">
            <h1>Potencia tu negocio</h1>
            <h2>Somos unicos, ponganos a prueba</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Nuestro producto</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="../Fotos/0000.jpg" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>1</span>Los mejores productos</h3>
                    <p>Siempre nos enfocamos en vender los mejores productos, con la mejor calidad, con el mejor rendimiento para que asi el cliente sienta que es muy importante y muy especial para nosotros, como debe de ser.</p>
                    <h3><span>2</span>El mejor servicio</h3>
                    <p>Nuestro servicio esta enfocado en un 100% en hacer sentir al cliente comodo y agradable con lo que está haciendo en nuestro software que seria comprar.</p>
                </div>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Portafolio</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="../Fotos/img1.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="../Fotos/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="../Fotos/img2.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="../Fotos/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="../Fotos/img3.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="../Fotos/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="../Fotos/img1.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="../Fotos/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="../Fotos/img4.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="../Fotos/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="../Fotos/img5.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="../Fotos/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="../Fotos/img6.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="../Fotos/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="../Fotos/img7.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="../Fotos/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clientes contenedor">
            <h2 class="titulo">Que dicen nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="../Fotos/masculinización-facial-masculina.webp" alt="">
                    <div class="contenido-texto-card">
                        <h4>Juan Carlos Sanchez</h4>
                        <p>Estoy muy satisfecho con el servicio que me han prestado, porque siento que tratan al clientes como la principal persona de una compañia.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="../Fotos/images.jpeg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Andrea Otalvaro</h4>
                        <p>Me encanta el servicio, porque se ve que se enfocan en hacer sentir importante al cliente.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">Nuestros servicios</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img src="../Fotos/ilustracion1.svg" alt="">
                        <h3>Ventas Online</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, qui?</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="../Fotos/ilustracion4.svg" alt="">
                        <h3>Creación de Softwares</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, qui?</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="../Fotos/ilustracion3.svg" alt="">
                        <h3>Conectamos al Mundo</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, qui?</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include '../sidebar/footer.php'; ?>
    <script src="../estilos/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/73c11b743b.js" crossorigin="anonymous"></script>
</body>

</html>