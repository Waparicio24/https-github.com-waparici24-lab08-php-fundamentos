<?php
declare(strict_types=1);

/**
 * Lee estudiante.json desde la raíz del proyecto
 * y devuelve los datos del estudiante:
 * nombre, apellido, cedula y github_user.
 */
function cargar_estudiante(): array
{
    $ruta = __DIR__ . '/../estudiante.json';

    if (!file_exists($ruta)) {
        throw new RuntimeException(
            'No se encontró el archivo estudiante.json'
        );
    }

    $contenido = file_get_contents($ruta);

    if ($contenido === false) {
        throw new RuntimeException(
            'No se pudo leer estudiante.json'
        );
    }

    $datos = json_decode($contenido, true);

    if (!is_array($datos)) {
        throw new RuntimeException(
            'estudiante.json no contiene un JSON válido'
        );
    }

    if (!isset($datos['cedula']) || !is_string($datos['cedula'])) {
        throw new RuntimeException(
            'Falta la cédula del estudiante en estudiante.json'
        );
    }

    return $datos;
}