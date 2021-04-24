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

include "producto.php";

if (isset($_POST["barras"]) && isset($_POST["nombre"]) && isset($_POST["tipo"])&& isset($_POST["stock"])&& isset($_POST["precio"]) )
{
    $nuevoUsuario = new Usuario($_POST["usuario"],$_POST["clave"],$_POST["mail"]);
  
    $b = Usuario::CargarUsuarioJSON($nuevoUsuario);
    
    if($b){
        $ruta = $_FILES['foto']['name'];
        $ext = pathinfo($ruta, PATHINFO_EXTENSION);
        $destino = "usuario/fotos/".$nuevoUsuario->id.".".$ext;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
        echo ("Usuario cargado con exito");
    }
    else
        echo ("No se cargo el usuario");

}
else
    echo "Datos incompletos. No se guarda informacion de usuario";

?>