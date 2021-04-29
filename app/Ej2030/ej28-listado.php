<?php
/*Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.json.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>apellido, nombre,foto</li>
<li>apellido, nombre,foto</li>
</ul>
Hacer los métodos necesarios en la clase usuario*/

include "usuario.php";
include "AccesoDatos.php";
include "funciones.php";

if (isset($_GET['lista']))
{
    switch ($_GET['lista'])
    {
        case "usuarios":

            echo Usuario::ListarBase("clase5");
            break;

        case "productos":
            echo "Proximamente lista de productos";
            break;
    
        case "vehiculos":
            echo "Proximamente lista de vehículos";
            break;
        
        default:
            echo "No se reconoce el listado solicitado. Solicite usuarios, productos, etc";
            break;

    }
}
else
    echo "No se reconoce la consulta. Solicite usuarios, productos, etc";

?>