<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php

include '../conexion/conexion.php';
include '../sweetalert.php/sweetalert.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

if (isset($_POST['Enviar'])) {
    $correo = $_POST['correo'];

    $stmt = $conexion->prepare("SELECT correo FROM usuarios WHERE correo = ?");
    $stmt->bind_param('s', $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $correo_base = $row['correo'];

        if ($correo == $correo_base) {
            $mail = new PHPMailer(true);

            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'pipealzategil@gmail.com'; // Tu dirección de correo Gmail
                $mail->Password   = 'expp tnmj demx ijbt'; // Tu contraseña de Gmail
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                $mail->SMTPOptions = ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true]];

                // Configuración del remitente y destinatario
                $mail->setFrom('pipealzategil@gmail.com', $correo);
                $mail->addAddress($correo, 'Recuperación de contraseña de tu cuenta en EnAlta Shop');

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Asunto del correo';
                $mail->Body    = 'Estimado/a' . " " . $correo . ',
        
                Esperamos que este mensaje te encuentre bien. Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en EnAlta Shop. Entendemos lo frustrante que puede ser olvidar la contraseña, y estamos aquí para ayudarte a recuperar el acceso a tu cuenta de manera segura.
                
                <br>
                <br>
        
                Para continuar con el proceso de recuperación, por favor sigue el enlace proporcionado a continuación: <a href="http://localhost/enalta/olvido-contrase%C3%B1a/actualizar-contrase%c3%b1a.php">Haz clic aquí para restablecer tu contraseña</a>

                
                
                <br>
                <br>
        
                Queremos recordarte la importancia de elegir una nueva contraseña que puedas recordar fácilmente, pero al mismo tiempo, que sea lo suficientemente segura para proteger tu cuenta contra accesos no autorizados. Te sugerimos utilizar una combinación de letras mayúsculas y minúsculas, números y caracteres especiales.
                
                <br>
                <br>
        
                Si no has solicitado esta acción y crees que esto puede deberse a un error, por favor, ignora este correo electrónico. Tu seguridad es nuestra prioridad, y estamos tomando todas las medidas necesarias para garantizar que tu cuenta esté protegida.
                
                <br>
                <br>
        
                En caso de tener alguna pregunta o necesitar asistencia adicional, no dudes en ponerte en contacto con nuestro equipo de soporte. Estamos aquí para ayudarte en todo momento.
                
                <br>
                <br>
        
                Agradecemos tu comprensión y paciencia durante este proceso. Gracias por confiar en EnAlta Shop.
                
                <br>
                <br>
        
                Saludos cordiales,
                Felipe Alzate Gil
                CEO de EnAlta Shop
                EnAlta Shop Support Team';
                // Enviar el correo
                $mail->send();
                echo $Notificacion_correo;
            } catch (Exception $e) {
                echo "Error al enviar el correo: {$mail->ErrorInfo}";
            }
        }
    } else {
        echo "<script>alert('El correo ingresado no existe en nuestra base de datos');window.location.href = '../olvido-contraseña/olvido.html'</script>";
    }
    // Crea una instancia de PHPMailer

}
