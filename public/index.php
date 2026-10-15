<?php
// 1. Cargamos la función que lee los datos del estudiante.
require_once __DIR__ . '/../lib/estudiante.php';

// 2. Obtenemos el nombre, apellido, cédula y usuario de GitHub.
$est = cargar_estudiante();

// 3. Configuramos la hora de Panamá.
date_default_timezone_set('America/Panama');

// 4. Guardamos el apellido para utilizarlo en el título.
$apellido = $est['apellido'];

// 5. Preparamos la fecha y hora actual.
$fecha = date('d/m/Y H:i');

/*
 * 6. Esta variable guarda la versión de PHP
 * que está ejecutando nuestra página.
 */
$versionPHP = PHP_VERSION;

// 7. Preparamos el nombre completo del estudiante.
$nombreCompleto = $est['nombre'] . ' ' . $est['apellido'];

// 8. La página HTML mostrará los datos obtenidos con PHP.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 8 - <?= htmlspecialchars($apellido, ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($nombreCompleto, ENT_QUOTES, 'UTF-8') ?></h1>

    <p>Versión de PHP:
        <?php
        // Mostramos la versión de PHP con echo.
        echo htmlspecialchars($versionPHP, ENT_QUOTES, 'UTF-8');
        ?>
    </p>

    <p>Fecha y hora de Panamá:
        <?php
        # Mostramos la fecha y hora actual con print.
        print htmlspecialchars($fecha, ENT_QUOTES, 'UTF-8');
        ?>
    </p>
</body>
</html>