<?php
/*
Ezequiel Rios
Aplicación No 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
carga los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en las clases
*/
require_once "producto.php";
require_once "venta.php";
require_once "funciones.php";

//array de parametros $_POST para validar
$arPost = ["barras","idUsuario","cantidad"];


//se valida que todos los parametros post esten completos einicializados

if (ValidarPost($arPost))
{
    $venta = new Venta ($_POST["barras"],$_POST["idUsuario"],$_POST["cantidad"]);
    echo(Venta::RealizarVenta($venta));
}
else  
    echo("Faltan datos. No se realiza la venta");



?>