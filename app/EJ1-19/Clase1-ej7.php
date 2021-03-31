<?php
/*
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.Luego imprimir (utilizando la estructura for) 
cada uno en una línea distinta (recordar que elsalto de línea en HTML es la etiqueta <br/>). 
Repetir la impresión de los números utilizandolas estructuras while y foreach.
*/

$aux = 0;
$cont = 0;
$mod = 0;
$impares = array();
$impar = 0;



while ($cont < 10)
{
    $aux ++;
    
    $mod = $aux % 2;
    
    if ($mod <> 0)
    {
        $cont++;
        array_push($impares, $aux);
    }
}

echo "Utilizando For<br/>"; 

for ($cont = 0; $cont <= 9 ; $cont++)
{
    echo $impares[$cont], "<br/>";
}

$cont = 0;

echo "<br/><br/>Utilizando While<br/>";

while ($cont <= 9)
{
    echo $impares[$cont], "<br/>";
    $cont++;
}

echo "<br/><br/>Utilizando Foreach<br/>"; 
foreach ($impares as $valor)
{
    echo $valor, "<br/>";
}
?>