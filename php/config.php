<?php

/*==================================================
                ZONA HORARIA
==================================================*/

date_default_timezone_set('America/Monterrey');

/*==================================================
                SMTP
==================================================*/

// Titan Mail
define('SMTP_HOST', 'smtp.titan.email');

// TLS = 587 | SSL = 465
define('SMTP_PORT', 587);

// Correo de envío
define('SMTP_USERNAME', 'sales@eulerindustrial.com');

// Agregar cuando tengas la contraseña
define('SMTP_PASSWORD', '');

/*==================================================
                REMITENTE
==================================================*/

define('SMTP_FROM', 'sales@eulerindustrial.com');

define('SMTP_FROM_NAME', 'Euler Industrial Solutions');

/*==================================================
                DESTINATARIO
==================================================*/

// Correo que recibirá las cotizaciones
define('MAIL_TO', 'sales@eulerindustrial.com');

/*==================================================
                SITIO
==================================================*/

define('SITE_NAME', 'Euler Industrial Solutions');

define('SITE_URL', 'https://eulerindustrial.com');

define('SITE_PHONE', '+52 867 255 4734');

define('SITE_EMAIL', 'sales@eulerindustrial.com');

/*==================================================
                SEGURIDAD
==================================================*/

// Longitud mínima del mensaje
define('MIN_MESSAGE_LENGTH', 15);

// Longitud máxima
define('MAX_MESSAGE_LENGTH', 3000);

