<?php
/*
Ezequiel Rios
Aplicación No 27 (Registro BD)
Archivo: registro.php
método:POST
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos la base de datos
retorna si se pudo agregar o no.
*/

include "usuario.php";

$arPost = ["usuario","apellido","clave","mail","localidad"];

if (ValidarPost($arPost))
{
    $nuevoUsuario = new Usuario($_POST["usuario"],$_POST["apellido"],$_POST["clave"],$_POST["mail"],$_POST["localidad"]); 
    
    var_dump($nuevoUsuario);
    
/*    Usuario::CargarUsuarioSQL($nuevoUsuario);
  
    $bool = true;
    if($bool){
        echo ("Usuario cargado con exito");
    }
    else
        echo ("No se cargo el usuario");
*/
}
else
    echo "Datos incompletos. No se guarda informacion de usuario";

?>