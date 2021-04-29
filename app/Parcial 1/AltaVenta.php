<?php
/*a- (1 pts.) AltaVenta.php: (por POST)se recibe el email del usuario y el sabor,tipo y cantidad ,si el ítem existe en
helados.json, y hay stock guardar en la base de datos( con la fecha, número de pedido y id autoincremental ) y se
debe descontar la cantidad vendida del stock .
*/
    include "Venta.php";
    include "AccesoDatos.php";

    if (isset($_POST['mail']) && isset($_POST['sabor']) && isset($_POST['tipo']) && isset($_POST['cantidad'])){
        
        $venta = new Venta($_POST['mail'], $_POST['sabor'], $_POST['tipo'], $_POST['cantidad']);

        echo(Helado::RealizarVenta($venta));
        

    }
    else{
        echo("Faltan datos. No se genera pizza");
    }
?>