<?php
/******************************************************************************

Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, 
quecontenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar treslapiceras.

*******************************************************************************/
$lap1['Color']="Azul"; $lap1['Marca']="Vic"; $lap1['Trazo']="Estandar"; $lap1['Precio']= 100;
$lap2['Color']="Verde"; $lap2['Marca']="Vic"; $lap2['Trazo']="Fino"; $lap2['Precio']= 150;
$lap3['Color']="Negra"; $lap3['Marca']="Faber Castell"; $lap3['Trazo']="Estandar"; $lap3['Precio']= 500;

$lapiceras = array ($lap1, $lap2, $lap3);

foreach ($lapiceras as $valor1)
{
    foreach ($valor1 as $key => $valor2)
    {
        echo $key, ": ", $valor2, "<br/>";
    }
    echo "<br/>", "<br/>";
}

?>