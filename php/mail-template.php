<?php

function generarPlantillaCorreo(array $datos): string
{

    $fecha = date('d/m/Y H:i');

    return '

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Nueva solicitud</title>

</head>

<body style="margin:0;padding:0;background:#f4f4f4;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4;padding:40px 0;">

<tr>

<td align="center">

<table width="700" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 10px 35px rgba(0,0,0,.08);">

<!-- HEADER -->

<tr>

<td style="background:#050505;padding:35px;text-align:center;">

<h1 style="margin:0;color:#15850f;font-size:30px;">

Euler Industrial Solutions

</h1>

<p style="margin:12px 0 0;color:#ffffff;font-size:16px;">

Nueva solicitud desde el sitio web

</p>

</td>

</tr>

<!-- BODY -->

<tr>

<td style="padding:40px;">

<table width="100%" cellpadding="8">

<tr>

<td width="180"><strong>Nombre</strong></td>

<td>'.$datos['nombre'].'</td>

</tr>

<tr>

<td><strong>Empresa</strong></td>

<td>'.$datos['empresa'].'</td>

</tr>

<tr>

<td><strong>Correo</strong></td>

<td>'.$datos['email'].'</td>

</tr>

<tr>

<td><strong>Teléfono</strong></td>

<td>'.$datos['telefono'].'</td>

</tr>

<tr>

<td><strong>Servicio</strong></td>

<td>'.$datos['servicio'].'</td>

</tr>

</table>

<br>

<div style="background:#f7f7f7;border-left:5px solid #15850f;padding:25px;border-radius:6px;">

<h3 style="margin-top:0;">

Mensaje

</h3>

<p style="margin:0;line-height:1.7;white-space:pre-line;">

'.$datos['mensaje'].'

</p>

</div>

</td>

</tr>

<!-- FOOTER -->

<tr>

<td style="background:#fafafa;border-top:1px solid #ececec;padding:25px;font-size:13px;color:#777;">

<table width="100%">

<tr>

<td>

<strong>Fecha:</strong>

'.$fecha.'

</td>

</tr>

<tr>

<td>

<strong>Sitio:</strong>

https://eulerindustrial.com

</td>

</tr>

<tr>

<td>

<strong>IP:</strong>

'.$datos['ip'].'

</td>

</tr>

</table>

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




