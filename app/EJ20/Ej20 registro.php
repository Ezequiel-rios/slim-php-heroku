<?php
include "usuario.php";
$nuevoUsuario = new Usuario;

$nuevoUsuario->usuario = $_POST["usuario"];
$nuevoUsuario->clave = $_POST["clave"];
$nuevoUsuario->mail = $_POST["mail"];


Usuario::CargarUsuario($nuevoUsuario); 

?>