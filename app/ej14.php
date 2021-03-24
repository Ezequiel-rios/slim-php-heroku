<?php
/*Nestor Ezequiel Rios 
Crear una función llamada esPar que reciba un valor entero como parámetro y devuelva TRUE
si este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función esImpar.*/
$n = 8;

if (esImpar($n))
    echo "es impar";
else
    echo "es Par";

function esPar ($n)
{
    $mod = $n % 2;

    if ($mod == 0)
        return true;
    else
        return false;    
}

function esImpar ($n)
{
    $mod = $n % 2;

    if ($mod == 0)
        return false;
    else
        return true;    
}
?>