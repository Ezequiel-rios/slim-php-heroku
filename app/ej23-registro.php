<?php
/*
Ezequiel Rios
Aplicación No 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
crear un dato con la fecha de registro , toma todos los datos y utilizar sus métodos para
poder hacer el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
*/
include "usuario.php";

//chequeo que los los datos esten seteados y no sean vacios
if (isset($_POST["usuario"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_FILES["foto"]) && $_POST["usuario"] != "" && $_POST["clave"] != "" && $_POST["mail"] != "" && $_FILES["foto"]["name"] != "")
{    
    $nuevoUsuario = new Usuario($_POST["usuario"],$_POST["clave"],$_POST["mail"]);
  
    $bool = Usuario::CargarUsuarioJSON($nuevoUsuario);
    
    if($bool){
        echo ("Usuario cargado con exito");
    }
    else
        echo ("No se cargo el usuario");

}
else
    echo "Datos incompletos. No se guarda informacion de usuario";


?>
