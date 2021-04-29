<?php
/*
Ezequiel Rios
Aplicación No 32(Modificacion BD)
Archivo: ModificacionUsuario.php
método:POST
Recibe los datos del usuario(nombre, clavenueva, clavevieja,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer la modificación,
guardando los datos la base de datos
retorna si se pudo agregar o no.
Solo pueden cambiar la clave
*/

require_once "usuario.php";
require_once "funciones.php";
require_once 'AccesoDatos.php';


$arPost = ["usuario","apellido","clave","mail","localidad"];

if (ValidarPost($arPost))
{
    $nuevoUsuario = new Usuario($_POST["usuario"],$_POST["clave"],$_POST["mail"],$_POST["apellido"],$_POST["localidad"],""); 
    
    $test = Usuario::CargarUsuarioBase($nuevoUsuario,"clase5");
   
    


}
else
    echo "Datos incompletos. No se guarda informacion de usuario";

?>



