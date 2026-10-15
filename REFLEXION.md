# Reflexión (Etapa 4)

Responde con tus palabras (mínimo 40 palabras por respuesta). Ver README, Etapa 4.

# Pregunta 1 Mi código personal es 44b81700. En PHP, este valor es de tipo string, como comprobé utilizando la función gettype(). Esto sucede porque la función substr() devuelve una parte de una cadena de texto, en este caso los primeros ocho caracteres de la huella SHA-256. Aunque el código contiene números y letras, PHP lo maneja como texto. Si intentara utilizarlo en una suma, PHP trataría de interpretarlo como un valor numérico, pero al contener letras no podría convertir toda la cadena en un número válido. Por eso es importante conocer el tipo de dato de cada variable antes de realizar operaciones. # 


# Pregunta 2     La variable $precio aparece como double porque PHP utiliza ese nombre para identificar los números decimales de punto flotante cuando consultamos su tipo con gettype(). Aunque en el código utilizamos operaciones que producen un float, el resultado de gettype() es double. La expresión 0.1 + 0.2 == 0.3 devuelve false porque algunos números decimales no se pueden representar exactamente en formato binario, lo que genera pequeñas diferencias de precisión. Por otra parte, $n1 es de tipo integer porque contiene un número entero, que en mi ejecución fue 87. La división con / puede producir un decimal, mientras que intdiv() devuelve el cociente entero y descarta la parte decimal. # 

# Pregunta 3     En mi programa utilicé define() para crear la constante SEMILLA_LAB8 y const para declarar LAB_NUMERO. La diferencia principal es que define() permite crear una constante mediante una función durante la ejecución del programa, mientras que const permite declararla directamente en el código. En mi prueba, al intentar definir nuevamente SEMILLA_LAB8 con otro valor mediante @define('SEMILLA_LAB8', 'otra'), obtuve false, porque la constante ya estaba definida y PHP no permite cambiar su valor de esa manera. Realicé la prueba con PHP 8.2.12 y Apache 2.4.58 en Windows utilizando XAMPP, y comprobé el resultado en la terminal al ejecutar mi archivo tipos.php. # 

