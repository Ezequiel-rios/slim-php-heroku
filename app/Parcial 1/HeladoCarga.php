<?php
/*
    (por GET)se ingresa Sabor, precioBruto, Tipo (“agua” o “crema”), cantidad( de
    unidades de palitos helados) el objeto helado tiene función que guarda el precio más IVA en el atributo
    precioFinal. Se guardan los datos en en el archivo de texto helados.json, tomando un id autoincremental como
    identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.
    Validar que los valores sean válidos.
*/

    if (isset($_GET['sabor']) && isset($_GET['precioBruto']) && isset($_GET['tipo']) && isset($_GET['cantidad']))
     {
        $helado = new Helado($_GET['sabor'], $_GET['precioBruto'], $_GET['tipo'], $_GET['cantidad']);

        echo(Helado::CargarHelado($helado));

    }
    else
        echo("Faltan datos. No se genera helado");


?>
