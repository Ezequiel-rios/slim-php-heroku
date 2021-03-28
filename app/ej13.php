<?php
/*Nestor Ezequiel Rios 
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.*/
$palabra = "Parcial";
$n = 1;

validar ($palabra, $n);

function validar ($str, $max)
{
    $lista = array("Recuperatorio", "Parcial", "Programacion");
    $largo = strlen ($str);
    if ($largo > $max)
    {
        echo "La palabra supera la cantidad maxima de caracteres permitidos";
    }    
    elseif(in_array($str, $lista))
        return 1;
    else
        return 0;
}

?>