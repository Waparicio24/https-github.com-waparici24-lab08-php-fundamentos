<?php
declare(strict_types=1);

require_once __DIR__ . '/../lib/estudiante.php';

$est = cargar_estudiante();
$cfg = require __DIR__ . '/../config/db.php';

if (
    !isset($est['cedula'], $est['github_user']) ||
    !is_string($est['cedula']) ||
    !is_string($est['github_user'])
) {
    throw new RuntimeException(
        'Faltan la cédula o el usuario de GitHub en estudiante.json'
    );
}

$db = new mysqli(
    $cfg['host'],
    $cfg['user'],
    $cfg['pass'],
    $cfg['name'],
    (int) $cfg['port']
);

$db->set_charset('utf8mb4');

if (PHP_SAPI !== 'cli') {
    header('Content-Type: application/json; charset=utf-8');
}

$dbVersion = $db->query('SELECT VERSION()')->fetch_row()[0];
$dbNombre = $db->query('SELECT DATABASE()')->fetch_row()[0];

$filas = (int) $db
    ->query('SELECT COUNT(*) FROM estudiantes')
    ->fetch_row()[0];

$token = substr(
    hash(
        'sha256',
        $est['cedula'] . '|' . $est['github_user'] . '|WEB2026-L8'
    ),
    0,
    10
);

echo json_encode([
    'php_version' => PHP_VERSION,
    'sapi' => php_sapi_name(),
    'os_family' => PHP_OS_FAMILY,
    'servidor' => $_SERVER['SERVER_SOFTWARE'] ?? 'cli',
    'mysqli' => extension_loaded('mysqli'),
    'db_version' => $dbVersion,
    'db_nombre' => $dbNombre,
    'filas' => $filas,
    'token' => $token,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

$db->close();