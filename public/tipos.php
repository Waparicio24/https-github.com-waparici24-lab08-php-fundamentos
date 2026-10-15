<?php
declare(strict_types=1);

// 3.1: Definimos las constantes solicitadas.
define('SEMILLA_LAB8', 'WEB2026-L8');
const LAB_NUMERO = 8;

// Cargamos los datos del estudiante.
require_once __DIR__ . '/../lib/estudiante.php';
$est = cargar_estudiante();

// 3.2: Calculamos la huella SHA-256 con la cédula.
$huella = hash('sha256', $est['cedula'] . '|' . SEMILLA_LAB8);

// Obtenemos el código personal de ocho caracteres.
$codigo = substr($huella, 0, 8);

// Calculamos los dos números enteros.
$n1 = hexdec(substr($huella, 8, 2)) % 90 + 10;
$n2 = hexdec(substr($huella, 10, 2)) % 90 + 10;

// Calculamos el precio y el estado booleano.
$precio = round(hexdec(substr($huella, 12, 4)) / 100, 2);
$activo = ($n1 % 2 === 0);

// Operaciones aritméticas.
$suma = $n1 + $n2;
$division = round($n1 / $n2, 2);
$resto = $n1 % $n2;
$cociente = intdiv($n1, $n2);

// Otros tipos de datos.
$nulo = null;
$lista = [1, 2, 3];

// 3.3: Mostramos los tipos y valores solicitados.
var_dump($codigo, $n1, $precio, $activo, $nulo, $lista);

// Expresiones para practicar conversión de tipos.
$suma_str = "5" + "10";
$concat = "5" . "10";
$cast_int = (int) "12abc";
$float_eq = (0.1 + 0.2 == 0.3);
$loose = ("10" == "1e1");
$strict = ("10" === "1e1");

/*
 * "5" + "10" suma los valores numéricos y da 15.
 * El punto concatena cadenas y produce "510".
 * El cast convierte "12abc" en el entero 12 en PHP 8.2.
 * La comparación de decimales da false por la precisión binaria.
 * La comparación flexible puede convertir los valores numéricos.
 * La comparación estricta también compara los tipos de datos.
 */

// 3.4: Construimos el arreglo asociativo para el autograde.
$resultado = [
    'codigo' => $codigo,
    'n1' => $n1,
    'n2' => $n2,
    'suma' => $suma,
    'division' => $division,
    'resto' => $resto,
    'cociente' => $cociente,
    'precio' => $precio,
    'activo' => $activo,
    'tipos' => [
        'codigo' => gettype($codigo),
        'n1' => gettype($n1),
        'precio' => gettype($precio),
        'activo' => gettype($activo),
        'nulo' => gettype($nulo),
        'lista' => gettype($lista),
    ],
    'juggling' => [
        'suma_str' => $suma_str,
        'concat' => $concat,
        'cast_int' => $cast_int,
        'float_eq' => $float_eq,
        'loose' => $loose,
        'strict' => $strict,
    ],
    'constantes' => [
        'SEMILLA_LAB8' => constant('SEMILLA_LAB8'),
        'LAB_NUMERO' => LAB_NUMERO,
        'redefinir' => @define('SEMILLA_LAB8', 'otra'),
    ],
];

// Imprimimos la línea que busca el autograde.
echo "\n##JSON## " . json_encode($resultado) . "\n";