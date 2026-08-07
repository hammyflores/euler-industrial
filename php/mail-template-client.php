<?php

function generarCorreoCliente(array $datos): string
{

    $fecha = date('d/m/Y');

    return '

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Gracias por contactarnos</title>

</head>

<body style="
margin:0;
padding:40px;
background:#f4f4f4;
font-family:Arial,Helvetica,sans-serif;
">

<table width="100%" cellpadding="0" cellspacing="0">

<tr>

<td align="center">

<table width="700" cellpadding="0" cellspacing="0"
style="
background:#ffffff;
border-radius:14px;
overflow:hidden;
box-shadow:0 10px 35px rgba(0,0,0,.08);
">

<!-- HEADER -->

<tr>

<td
style="
background:#050505;
padding:45px;
text-align:center;
">

<h1
style="
margin:0;
color:#15850F;
font-size:30px;
">

Euler Industrial Solutions

</h1>

<p
style="
margin-top:14px;
font-size:17px;
color:#ffffff;
">

Hemos recibido su solicitud

</p>

</td>

</tr>

<!-- BODY -->

<tr>

<td style="padding:45px;">

<p
style="
margin-top:0;
font-size:18px;
line-height:1.8;
color:#333;
">

Hola <strong>'.$datos['nombre'].'</strong>,

</p>

<p
style="
font-size:16px;
line-height:1.8;
color:#555;
">

Gracias por contactar a
<strong>Euler Industrial Solutions.</strong>

<br><br>

Hemos recibido correctamente su solicitud.

Uno de nuestros especialistas revisará la información
y se pondrá en contacto con usted a la brevedad.

</p>

<br>

<table
width="100%"
cellpadding="12"
style="
background:#f8f8f8;
border-left:5px solid #15850F;
border-radius:8px;
">

<tr>

<td>

<strong>Empresa</strong>

</td>

<td>

'.$datos['empresa'].'

</td>

</tr>

<tr>

<td>

<strong>Servicio</strong>

</td>

<td>

'.$datos['servicio'].'

</td>

</tr>

<tr>

<td>

<strong>Fecha</strong>

</td>

<td>

'.$fecha.'

</td>

</tr>

</table>

<br><br>

<table
align="center"
cellpadding="0"
cellspacing="0">

<tr>

<td
style="
background:#15850F;
border-radius:6px;
">

<a
href="https://eulerindustrial.com"
style="
display:inline-block;
padding:16px 34px;
color:#ffffff;
text-decoration:none;
font-weight:bold;
font-size:15px;
">

VISITAR NUESTRO SITIO

</a>

</td>

</tr>

</table>

<br><br>

<p
style="
font-size:15px;
line-height:1.8;
color:#666;
">

Si requiere atención inmediata puede comunicarse con nosotros.

<br><br>

📞 +52 867 255 4734

<br>

✉ sales@eulerindustrial.com

</p>

</td>

</tr>

<!-- FOOTER -->

<tr>

<td
style="
background:#050505;
padding:30px;
text-align:center;
">

<p
style="
margin:0;
color:#bbbbbb;
font-size:13px;
line-height:1.8;
">

Este es un correo automático.

Por favor no responda este mensaje.

<br><br>

© '.date('Y').' Euler Industrial Solutions

</p>

</td>

</tr>

</table>

</td>

</tr>

</table>

</body>

</html>

';

}


