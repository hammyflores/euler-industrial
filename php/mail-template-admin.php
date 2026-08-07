<?php

function generarCorreoAdmin(array $datos): string
{

    $fecha = date('d/m/Y H:i');

    return '

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Nueva solicitud</title>

</head>

<body style="margin:0;padding:40px;background:#f4f4f4;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">

<tr>

<td align="center">

<table width="700" cellpadding="0" cellspacing="0"
style="
background:#ffffff;
border-radius:14px;
overflow:hidden;
box-shadow:0 8px 30px rgba(0,0,0,.08);
">

<tr>

<td
style="
background:#050505;
padding:40px;
text-align:center;
">

<h1
style="
margin:0;
font-size:30px;
color:#15850F;
">

Euler Industrial Solutions

</h1>

<p
style="
margin-top:12px;
color:#ffffff;
font-size:17px;
">

Nueva solicitud desde el sitio web

</p>

</td>

</tr>

<tr>

<td style="padding:40px;">

<table width="100%" cellpadding="12">

<tr>

<td width="180">

<strong>Nombre</strong>

</td>

<td>

'.$datos['nombre'].'

</td>

</tr>

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

<strong>Correo</strong>

</td>

<td>

'.$datos['email'].'

</td>

</tr>

<tr>

<td>

<strong>Teléfono</strong>

</td>

<td>

'.$datos['telefono'].'

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

</table>

<br>

<div
style="
background:#F7F7F7;
border-left:5px solid #15850F;
padding:25px;
border-radius:8px;
">

<h2
style="
margin-top:0;
font-size:20px;
">

Mensaje

</h2>

<p
style="
margin:0;
line-height:1.8;
font-size:15px;
">

'.$datos['mensaje'].'

</p>

</div>

</td>

</tr>

<tr>

<td
style="
padding:25px 40px;
background:#fafafa;
border-top:1px solid #e5e5e5;
font-size:13px;
color:#777;
">

<strong>Fecha:</strong>

'.$fecha.'

<br><br>

<strong>Sitio:</strong>

https://eulerindustrial.com

<br><br>

<strong>IP:</strong>

'.$datos['ip'].'

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


