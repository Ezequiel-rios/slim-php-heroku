<?php
/*Nestor Ezequiel Rios 
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.*/

$palabra = "Hola como estan?";
$largo = strlen ($palabra);

$largo--;

for ($cont = $largo; $cont >= 0 ; $cont--)
{
    echo $palabra[$cont];
}

?>