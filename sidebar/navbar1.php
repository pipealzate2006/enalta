<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../Fotos/enaltashop.png" type="image/x-icon">
    <title>Compras</title>
    <style>
        /*===== GOOGLE FONTS =====*/
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

        /*===== VARIABLES CSS =====*/
        :root {
            --header-height: 3rem;

            /*===== Colores =====*/
            --first-color: #3664F4;
            --dark-color: #070D1F;
            --dark-color-alt: #282B3A;
            --white-color: #E6E7E9;

            /*===== Fuente y tipografia =====*/
            --body-font: 'Poppins', sans-serif;
            --normal-font-size: .938rem;
            --small-font-size: .813rem;

            /*===== z index =====*/
            --z-fixed: 100;
        }

        @media screen and (min-width: 768px) {
            :root {
                --normal-font-size: 1rem;
                --small-font-size: .875rem;
            }
        }

        /*===== BASE =====*/
        *,
        ::before,
        ::after {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            margin: var(--header-height) 0 0 0;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            font-weight: 500;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .bd-grid {
            max-width: 1024px;
            display: -ms-grid;
            display: grid;
            -ms-grid-columns: 100%;
            grid-template-columns: 100%;
            margin-left: 1.5rem;
            margin-right: 1.5rem;
        }

        /*===== HEADER =====*/
        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            padding: 0 1.5rem;
            background-color: var(--dark-color);
            z-index: var(--z-fixed);
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .header__logo {
            color: var(--white-color);
        }

        .header__toggle {
            font-size: 1.5rem;
            color: var(--white-color);
            cursor: pointer;
        }

        /*===== NAV =====*/
        @media screen and (max-width: 768px) {
            .nav {
                position: fixed;
                top: 0;
                left: -100%;
                background-color: var(--dark-color);
                color: var(--white-color);
                width: 100%;
                height: 100vh;
                padding: 1.5rem 0;
                z-index: var(--z-fixed);
                -webkit-transition: .5s;
                transition: .5s;
            }

            .btn {
                margin-top: 35px;
            }
        }

        .nav__content {
            height: 100%;
            -ms-grid-rows: max-content 1fr max-content;
            grid-template-rows: -webkit-max-content 1fr -webkit-max-content;
            grid-template-rows: max-content 1fr max-content;
            row-gap: 2rem;
        }

        .nav__close {
            position: absolute;
            right: 1.5rem;
            font-size: 1.3rem;
            padding: .25rem;
            background-color: var(--dark-color-alt);
            border-radius: 50%;
            cursor: pointer;
        }

        .nav__img {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 66px;
            height: 66px;
            background-color: var(--first-color);
            border-radius: 50%;
            overflow: hidden;
        }

        .nav__img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .nav__name {
            display: block;
            color: var(--white-color);
        }

        .nav__profesion {
            font-size: var(--small-font-size);
        }

        .nav__menu {
            -ms-flex-item-align: center;
            -ms-grid-row-align: center;
            align-self: center;
        }

        .nav__item {
            margin: 2.5rem 0;
        }

        .nav__link {
            color: var(--white-color);
        }

        .nav__social {
            padding-top: .5rem;
        }

        .nav__social-icon {
            font-size: 1.2rem;
            color: var(--white-color);
            margin-right: 1rem;
        }

        .nav__social-icon:hover {
            color: var(--first-color);
        }

        /*Aparecer menu*/
        .show {
            left: 0;
        }

        /*Active menu*/
        .active {
            color: var(--first-color);
        }


        /*===== MEDIA QUERIES =====*/
        @media screen and (min-width: 768px) {
            body {
                margin: 0;
            }

            .header {
                height: calc(var(--header-height) + 1rem);
            }

            .header__logo,
            .header__toggle {
                display: none;
            }

            .nav {
                width: 100%;
            }

            .nav__content {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 1rem;
            }

            .nav__close,
            .nav__profesion {
                display: none;
            }

            .nav__perfil {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }

            .nav__img {
                width: 32px;
                height: 32px;
                margin-right: .5rem;
                margin-bottom: 0;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }

            .nav__img img {
                width: 46px;
            }

            .nav__list {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }

            .nav__item {
                margin: 0 .25rem;
            }

            .nav__link {
                padding: .5rem .8rem;
                border-radius: .25rem;
            }

            .nav__link:hover {
                background-color: var(--first-color);
            }

            .active {
                background-color: var(--first-color);
                color: var(--white-color);
            }
        }

        @media screen and (min-width: 1024px) {
            .bd-grid {
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="header__logo" style="text-decoration: none;"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?></a>

        <ion-icon name="menu-outline" class="header__toggle" id="nav-toggle"></ion-icon>

        <nav class="nav" id="nav-menu">
            <div class="nav__content bd-grid">

                <ion-icon name="close-outline" class="nav__close" id="nav-close"></ion-icon>

                <div class="nav__perfil">
                    <div class="nav__img">
                        <img src="../Fotos/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" alt="">
                    </div>

                    <div>
                        <a href="#" class="nav__name" style="text-decoration: none;"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?></a>
                        <span class="nav__profesion">Web designer</span>
                    </div>
                </div>

                <div class="nav__menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="../index/index.php" class="nav__link active" style="text-decoration: none; display: block; margin-top: 15px;">Tienda</a></li>
                        <li class="nav__item"><a href="../index/conocenos.php" class="nav__link" style="text-decoration: none; display:block; margin-top: 15px;">Conocenos</a></li>
                    </ul>
                </div>

                <div class="nav__social" style="margin-top: 15px;">
                    <a href="#" class="nav__social-icon"><ion-icon name="logo-linkedin"></ion-icon></a>
                    <a href="#" class="nav__social-icon"><ion-icon name="logo-github"></ion-icon></a>
                    <a href="#" class="nav__social-icon"><ion-icon name="logo-behance"></ion-icon></a>
                </div>
            </div>
            <a href="../login/cerrarSesion.php"><button type="button" class="btn btn-info" style="margin-top: 15px;"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</button></a>
        </nav>
    </header>

    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="../estilos/js/bootstrap.min.js"></script>

    <!--===== MAIN JS =====-->
    <script>
        /*===== MENU SHOW Y HIDDEN =====*/
        const navMenu = document.getElementById('nav-menu'),
            toggleMenu = document.getElementById('nav-toggle'),
            closeMenu = document.getElementById('nav-close')

        /*SHOW*/
        toggleMenu.addEventListener('click', () => {
            navMenu.classList.toggle('show')
        })

        /*HIDDEN*/
        closeMenu.addEventListener('click', () => {
            navMenu.classList.remove('show')
        })

        /*===== ACTIVE AND REMOVE MENU =====*/
        const navLink = document.querySelectorAll('.nav__link');

        function linkAction() {
            /*Active link*/
            navLink.forEach(n => n.classList.remove('active'));
            this.classList.add('active');

            /*Remove menu mobile*/
            navMenu.classList.remove('show')
        }
        navLink.forEach(n => n.addEventListener('click', linkAction));
    </script>
</body>

</html>