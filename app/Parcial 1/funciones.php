<?php

//Agrega una linea a un archivo JSON
function CargarJson($nombreArchivo, $objeto){
    $miarchivo = fopen($nombreArchivo, "a");
    fwrite($miarchivo, json_encode($objeto)."\n");
    fclose($miarchivo);

}


//reemplaza el JSON existente con uno nuevo
function PisarJson($nombreArchivo, $arrayObjeto){
    $miarchivo = fopen($nombreArchivo, "w");
        foreach($arrayObjeto as $auxObj){
        fwrite($miarchivo, json_encode($auxObj)."\n");        
    }
    fclose($miarchivo);
}

//lee un archivo JSON y devuelve un array de objetos
function LeerJson($nombreArchivo){

            $archivo = fopen($nombreArchivo, "r");
            $arObjetos = array();
            $auxString;
            $auxObj;
                    
            while (!feof($archivo))
            {
                $auxString = fgets($archivo);
                if ($auxString)
                {
                 $auxObj = json_decode($auxString);
                 array_push($arObjetos, $auxObj); 
                }
            }
            fclose($archivo);

    return $arObjetos;

}


function CalcularIva($precioBruto){
    return $precioBruto *1.21;
}


function ArmarListaAssoc($arAssoc){
    $str = "<ul>";
    foreach($arAssoc as $Ar1){
        $str .= "<li>";
        foreach($Ar1 as $campo){
        $str .= "$campo, ";
        }
        $str .= "</li>";

    }
    $str .= "</ul>";
    return $str;

}
?>