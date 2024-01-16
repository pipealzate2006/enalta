<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pie de pagina</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }

        body {
            min-height: 100vh;
            margin: 0;
        }

        /*:::::Pie de Pagina*/
        .pie-pagina {
            width: 100%;
            background-color: #0a141d;
            position: relative;
            margin-top: 200px;
        }

        .pie-pagina .grupo-1 {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 50px;
            padding: 45px 0px;
        }

        .pie-pagina .grupo-1 .box figure {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pie-pagina .grupo-1 .box figure img {
            width: 250px;
        }

        .pie-pagina .grupo-1 .box h2 {
            color: #fff;
            margin-bottom: 25px;
            font-size: 20px;
        }

        .pie-pagina .grupo-1 .box p {
            color: #efefef;
            margin-bottom: 10px;
        }

        .pie-pagina .grupo-1 .red-social a {
            display: inline-block;
            text-decoration: none;
            width: 45px;
            height: 45px;
            line-height: 45px;
            color: #fff;
            margin-right: 10px;
            background-color: #0d2033;
            text-align: center;
            transition: all 300ms ease;
        }

        .pie-pagina .grupo-1 .red-social a:hover {
            color: aqua;
        }

        .pie-pagina .grupo-2 {
            background-color: #0a1a2a;
            padding: 15px 10px;
            text-align: center;
            color: #fff;
        }

        .pie-pagina .grupo-2 small {
            font-size: 15px;
        }

        @media screen and (max-width:800px) {
            .pie-pagina .grupo-1 {
                width: 90%;
                grid-template-columns: repeat(1, 1fr);
                grid-gap: 30px;
                padding: 35px 0px;
            }
        }
    </style>
</head>

<body>
    <!--::::Pie de Pagina::::::-->
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="../Fotos/logotipo-sleedw.svg" alt="Logo de SLee Dw">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Somos una tienda online dedicada a vender productos</p>
                <p>Somos nuevos, ponnos a prueba.</p>
                <p>Correo: felipegil444@gmail.com</p>
                <p>Telefono: +57 3228387084</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="https://www.facebook.com/felipe.alzate.9216778?mibextid=ZbWKwL" class="fa fa-facebook" target="_blank"></a>
                    <a href="https://www.instagram.com/falzate.14/?igshid=MzNlNGNkZWQ4Mg%3D%3D" class="fa fa-instagram" target="_blank"></a>
                    <a href="#" class="fa fa-twitter" target="_blank"></a>
                    <a href="https://www.youtube.com/" class="fa fa-youtube" target="_blank"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2021 <b>En Alta Shop</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
</body>

</html>