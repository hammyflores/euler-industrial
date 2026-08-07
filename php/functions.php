<?php

/*==================================================
                LIMPIAR TEXTO
==================================================*/

function limpiarTexto(string $texto): string
{
    return trim(
        htmlspecialchars(
            $texto,
            ENT_QUOTES,
            'UTF-8'
        )
    );
}

/*==================================================
                OBTENER POST
==================================================*/

function post(string $campo): string
{
    return isset($_POST[$campo])
        ? limpiarTexto($_POST[$campo])
        : '';
}

/*==================================================
                VALIDAR EMAIL
==================================================*/

function validarEmail(string $email): bool
{
    return filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    ) !== false;
}

/*==================================================
                CAMPOS OBLIGATORIOS
==================================================*/

function validarRequeridos(array $campos): bool
{
    foreach ($campos as $campo) {

        if ($campo === '') {

            return false;

        }

    }

    return true;
}

/*==================================================
                EVITAR HEADER INJECTION
==================================================*/

function contieneCabeceras(string $texto): bool
{
    return preg_match(
        '/(content-type:|bcc:|cc:|to:|mime-version:)/i',
        $texto
    ) === 1;
}

/*==================================================
                LONGITUD DEL MENSAJE
==================================================*/

function validarMensaje(string $mensaje): bool
{
    $longitud = mb_strlen($mensaje);

    return $longitud >= 15 && $longitud <= 3000;
}

/*==================================================
                OBTENER IP
==================================================*/

function obtenerIP(): string
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        return $_SERVER['HTTP_CLIENT_IP'];

    }

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];

    }

    return $_SERVER['REMOTE_ADDR'] ?? 'Desconocida';
}

/*==================================================
                RESPUESTA JSON
==================================================*/

function responder(
    bool $success,
    string $message,
    array $extra = []
): void {

    header('Content-Type: application/json');

    echo json_encode(
        array_merge(
            [
                'success' => $success,
                'message' => $message
            ],
            $extra
        )
    );

    exit;
}


