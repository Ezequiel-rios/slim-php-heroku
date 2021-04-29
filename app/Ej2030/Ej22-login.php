<?php
include "Ej22-usuarios.php";


if (isset($_POST["usuario"]) && isset($_POST["clave"]))
{
    $nuevoUsuario = new Usuario;
    $nuevoUsuario->usuario = $_POST["usuario"];
    $nuevoUsuario->clave = $_POST["clave"];
    
    echo $nuevoUsuario->VerificarLogin($nuevoUsuario);
}
else
    echo "Datos incompletos";


?>