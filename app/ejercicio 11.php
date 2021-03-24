<?php
/*Nestor Ezequiel Rios 
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función
que las calcule invocando la función pow)*/

$resultado = 0;

for ($cont1 = 1; $cont1 <= 4 ; $cont1++)
{
    for ($cont2 = 1; $cont2 <= 4 ; $cont2++)
    {
        potencia ($cont1, $cont2);
    }
}

function Potencia($n1, $n2)
{
    $resultado = pow($n1, $n2);
    echo "$n1 elevado a la $n2 es igual a $resultado <br/>";
}

?>