<?php

header('Content-Type: application/json');

require_once 'config.php';
require_once 'functions.php';

require_once 'mail-template-admin.php';
require_once 'mail-template-client.php';

require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/*==================================================
                SOLO POST
==================================================*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    responder(false, 'Método no permitido.');

}

/*==================================================
                HONEYPOT
==================================================*/

if (!empty($_POST['website'])) {

    responder(false, 'Solicitud rechazada.');

}

/*==================================================
                DATOS
==================================================*/

$nombre   = post('nombre');
$empresa  = post('empresa');
$email    = post('email');
$telefono = post('telefono');
$servicio = post('servicio');
$mensaje  = post('mensaje');

/*==================================================
                VALIDACIONES
==================================================*/

if (!validarRequeridos([
    $nombre,
    $email,
    $servicio,
    $mensaje
])) {

    responder(false, 'Complete todos los campos obligatorios.');

}

if (!validarEmail($email)) {

    responder(false, 'El correo electrónico no es válido.');

}

if (!validarMensaje($mensaje)) {

    responder(
        false,
        'El mensaje debe contener entre '
        . MIN_MESSAGE_LENGTH .
        ' y ' .
        MAX_MESSAGE_LENGTH .
        ' caracteres.'
    );

}

foreach ([
    $nombre,
    $empresa,
    $email,
    $telefono,
    $mensaje
] as $campo) {

    if (contieneCabeceras($campo)) {

        responder(false, 'Datos inválidos.');

    }

}

/*==================================================
                DATOS DEL CORREO
==================================================*/

$datos = [

    'nombre'   => $nombre,
    'empresa'  => $empresa,
    'email'    => $email,
    'telefono' => $telefono,
    'servicio' => $servicio,
    'mensaje'  => nl2br($mensaje),
    'ip'       => obtenerIP()

];

/*==================================================
                ENVIAR CORREOS
==================================================*/

try {

    $mail = new PHPMailer(true);

    $mail->isSMTP();

    $mail->Host = SMTP_HOST;

    $mail->SMTPAuth = true;

    $mail->Username = SMTP_USERNAME;

    $mail->Password = SMTP_PASSWORD;

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port = SMTP_PORT;

    $mail->CharSet = 'UTF-8';

    $mail->setFrom(
        SMTP_FROM,
        SMTP_FROM_NAME
    );

    /*
    ==================================
            CORREO ADMIN
    ==================================
    */

    $mail->addAddress(
        MAIL_TO,
        SMTP_FROM_NAME
    );

    $mail->addReplyTo(
        $email,
        $nombre
    );

    $mail->isHTML(true);

    $mail->Subject =
        'Nueva solicitud - ' . $servicio;

    $mail->Body =
        generarCorreoAdmin($datos);

    $mail->AltBody =
        "Nueva solicitud desde el sitio.";

    $mail->send();

    /*
    ==================================
        CORREO CLIENTE
    ==================================
    */

    $mail->clearAddresses();

    $mail->clearReplyTos();

    $mail->addAddress(
        $email,
        $nombre
    );

    $mail->Subject =
        'Hemos recibido su solicitud';

    $mail->Body =
        generarCorreoCliente($datos);

    $mail->AltBody =
        'Gracias por contactar a Euler Industrial Solutions.';

    $mail->send();

    responder(
        true,
        'Gracias. Hemos recibido su solicitud y uno de nuestros especialistas se pondrá en contacto con usted a la brevedad.'
    );

}

catch (Exception $e) {

    error_log($e->getMessage());

    responder(
        false,
        'No fue posible enviar su solicitud. Intente nuevamente más tarde.'
    );

}

