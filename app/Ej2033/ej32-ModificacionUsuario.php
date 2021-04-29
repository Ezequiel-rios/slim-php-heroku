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

require_once "usuario.php";
require_once "funciones.php";
require_once 'AccesoDatos.php';


$arPost = ["nombre","clavenueva","clavevieja","mail"];

if (ValidarPost($arPost))
{
    Usuario::ModificarClave($_POST["nombre"],$_POST["clavenueva"],$_POST["clavevieja"],$_POST["mail"], "clase5"); 

}
else
    echo "Datos incompletos. No se guarda informacion de usuario";

?>