<?php
/*Nestor Ezequiel Rios
(1pt.) HeladoConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo
helados.json, retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.
*/

if (isset($_POST['sabor']) && isset($_POST['tipo']))
{
   
   echo(Helado::ConsultaHelado($_POST['sabor'], $_POST['tipo']));
   
}
else
   echo("Faltan datos");

?>
