<?php
/*
Ezequiel Rios
Aplicación No 25 ( AltaProducto)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
crear un objeto y utilizar sus métodos para poder verificar si es un producto existente,
si ya existe el producto se le suma el stock , de lo contrario se agrega al documento en un
nuevo renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/
require_once "producto.php";
require_once "funciones.php";

//array de parametros $_POST para validar
$arPost = ["barras","nombre","tipo","stock","precio"];


//se valida que todos los parametros post esten completos einicializados

if (ValidarPost($arPost))
{
    $producto = new Producto ($_POST["barras"],$_POST["nombre"],$_POST["tipo"],$_POST["stock"],$_POST["precio"]);
    
    $resultado=$producto->IngresarProducto($producto);
    echo ($resultado);
}
else  
    echo("Faltan datos. No se creo producto");



?>