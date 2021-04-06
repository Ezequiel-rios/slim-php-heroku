<?php
include "Ej21-usuarios.php";

if (isset($_GET['lista']))
{
    switch ($_GET['lista'])
    {
        case "usuarios":

            echo Usuarios::Listar($_GET['lista']);
            break;

        case "productos":
            echo "Proximamente lista de productos";
            break;
    
        case "vehiculos":
            echo "Proximamente lista de vehículos";
            break;
        
        default:
            echo "No se reconoce el listado solicitado";
            break;

    }
}
else
    echo "No se reconoce la consulta";

?>