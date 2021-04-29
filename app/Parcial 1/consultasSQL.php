<?php
include "Helado.php";
include "AccesoDatos.php";
include "funciones.php";

    switch ($_POST["consulta"])
        {
            case "1":
                echo (Helado::CantidadVendida());
                break;
    
            case "2":
                echo (Helado::Usuarios($_POST["fecha1"],$_POST["fecha2"]));
                break;
        
            case "3":
                
                break;
            
            default:
                case "4":
                
                break;
                
                break;
    
        }


?>