<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../Fotos/enaltashop.png" type="image/x-icon">
    <title>Recuperar contraseña</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .info {
            text-align: center;
            background: -webkit-linear-gradient(left, #148de9, #857f7f, #857f7f, #148de9);
            padding: 20px;
            border-radius: 50px 50px 50px 50px;
            max-width: 600px;
        }

        .input-group {
            margin-bottom: 10px;
        }

        .input-group-text {
            background-color: #fff;
            /* Color de fondo del símbolo '@' */
        }

        .btn-primary {
            width: 100%;
            margin-top: 10px; /* Agrega un margen superior al botón para separarlo del último input */
        }
    </style>
</head>

<body background="../Fotos/74a9710422bc990c920298e487529da9.jpg">
    <div class="info">
        <h5>Actualiza tu contraseña</h5>
        <form action="" method="post">
            <div class="input-group">
                <label for="">Ingrese su correo de nuevo: </label>
                <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Correo electrónico" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
                <label for="">Contraseña: </label>
                <input type="password" class="form-control" placeholder="Contraseña" name="contraseña1" aria-label="Contraseña" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
                <label for="">Confirmar contraseña: </label>
                <input type="password" class="form-control" placeholder="Confirmar contraseña" name="contraseña2" aria-label="Confirmar contraseña" aria-describedby="basic-addon1">
            </div>
            <button type="submit" class="btn btn-primary" name="Enviar">Enviar</button>
        </form>
    </div>
    <?php 
    include '../conexion/conexion.php';
    include '../sweetalert.php/sweetalert.php';

    if (isset($_POST['Enviar'])) {
        $email = $_POST['email'];
        $contraseña1 = $_POST['contraseña1'];
        $contraseña2 = $_POST['contraseña2'];

        $md5 = md5($contraseña1);

        if ($contraseña1 == $contraseña2) {
            $sql = "UPDATE usuarios SET clave = '$md5' WHERE correo = '$email'";
            $query = mysqli_query($conexion, $sql);
            echo $Notificacion_contraseña;
        } else {
            echo "<script>alert('No se pudo actualizar la contraseña porque no combinan');window.location.href = '../olvido-contraseña/actualizar-contraseña.php'</script>";
        }
    }
    ?>
    <script src="../estilos/js/bootstrap.min.js"></script>
</body>

</html>
