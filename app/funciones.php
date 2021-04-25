<?php

//valida las variables post y controla que tengan valores
function ValidarPost($arVariable){
    $flag = false;
    foreach ($arVariable as $var){
            if (!isset($_POST[$var]) OR $_POST[$var] == "")
            $flag = true;
    }

    if ($flag)
        return false;
    else
        return true;
}

//valida las variables get y controla que tengan valores
function ValidarGet($arVariable){
    $flag = false;
    foreach ($arVariable as $var){
            if (!isset($_GET[$var]) OR $_GET[$var] == "")
            $flag = true;
    }

    if ($flag)
        return false;
    else
        return true;

}

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



?>