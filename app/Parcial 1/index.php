<?php
    include "Helado.php";
    include "funciones.php";

        $tipoRequest = $_SERVER['REQUEST_METHOD'];
       
        switch ($tipoRequest)
        {
            case "GET":
                if ($_GET["operacion"]=="carga"){
                    include "HeladoCarga.php";            
                }
                break;
    
            case "POST":
                if ($_POST["operacion"]=="consulta"){
                    include "HeladoConsultar.php";
                }
                if ($_POST["operacion"]=="venta"){
                    include "AltaVenta.php";
                }
                break;
        
            case "XX":
                
                break;
            
            default:
                
                break;
    
        }


?>