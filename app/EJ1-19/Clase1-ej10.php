<?php
/******************************************************************************
Ezequiel Rios
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, 
quecontenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar treslapiceras.

*******************************************************************************/
$lap1['Color']="Azul"; $lap1['Marca']="Vic"; $lap1['Trazo']="Estandar"; $lap1['Precio']= 100;
$lap2['Color']="Verde"; $lap2['Marca']="Vic"; $lap2['Trazo']="Fino"; $lap2['Precio']= 150;
$lap3['Color']="Negra"; $lap3['Marca']="Faber Castell"; $lap3['Trazo']="Estandar"; $lap3['Precio']= 500;

$lap_index = array ($lap1, $lap2, $lap3);

$lap_asoc['Lapicera1']=$lap1; $lap_asoc['Lapicera2']=$lap2; $lap_asoc['Lapicera3']=$lap3; 


echo "Array asociativo <br/><br/>";


foreach ($lap_asoc as $key1 => $valor1)
{
    echo $key1, "<br/>";

    foreach ($valor1 as $key2 => $valor2)
    {
        echo $key2, ": ", $valor2, "<br/>";
    }
    echo "<br/>", "<br/>";
}

echo "<br/><br/><br/>Array indexado<br/><br/>";

foreach ($lap_index as $key1 => $valor1)
{
    echo $key1, "<br/>";
    foreach ($valor1 as $key2 => $valor2)
    {
        echo $key2, ": ", $valor2, "<br/>";
    }
    echo "<br/>", "<br/>";
}


?>