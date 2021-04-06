<?php
include "Ej20-usuario.php";


if (isset($_POST["usuario"]) && isset($_POST["clave"]) && isset($_POST["mail"]))
{
    $nuevoUsuario = new Usuario;
    $nuevoUsuario->usuario = $_POST["usuario"];
    $nuevoUsuario->clave = $_POST["clave"];
    $nuevoUsuario->mail = $_POST["mail"];


    Usuario::CargarUsuario($nuevoUsuario); 
}
else
    echo "Datos incompletos. No se guarda informacion de usuario";

?>