<?php
    

    class Usuario
    {
        public $_usuario;
        public $_clave;
        public $_mail;
        public $_id;
        public $_fechaRegistro;
        public $_apellido;
        public $_localidad;



        public function __construct($u="", $c="", $m="", $a="", $l="", $id=""){
            $this->_usuario = $u;
            $this->_clave = $c;
            $this->_mail = $m;
            $this->_apellido = $a;
            $this->_localidad = $l;
            $this->_fechaRegistro = date("y.m.d");
            
            if($id!="")
                $this->_id = $id;
            
        }

        public static function ValidarUsuario (Usuarios $user){
            
            if (isset($user->_usuario) && isset($user->_clave) && isset($user->_mail))
            {
                return true;
            }
            else
            {
                echo "faltan datos";
                return false;
            }
        }
     
        public static function CargarUsuario (Usuarios $user){
            if (isset($user->_usuario) && isset($user->_clave) && isset($user->_mail))
            {
                $miarchivo = fopen("usuarios.csv", "a");
                fwrite ($miarchivo, "$user->_usuario, $user->_clave, $user->_mail \n");
                fclose($miarchivo);
            }
            else
            {
                echo "faltan datos";
            }
        }

        public static function Listar($lista){
           $miarchivo = fopen("$lista.csv", "r");
           $ar = array();
           $aux;

           while (!feof($miarchivo))
           {
               $aux = fgets($miarchivo);
               if ($aux)
               array_push($ar, $aux);
           }
            $str = "<ul>";

           for ($i = 0; $i < count($ar); $i++)
           {
               $str .= "<li> $ar[$i] </li>";
           }

           $str .= "</ul>";
           fclose($miarchivo);
           return $str;

        }

        public function VerificarLogin($user){
            $validacion = null;
            $miarchivo = fopen("usuarios.csv", "r");

            while (!feof($miarchivo))
            {
                $aux = fgetcsv($miarchivo, 10000, $delimiter = ",");
              
                if ($aux && $aux[0] == $user->_usuario)
                {
                    if ($aux[1] == $user->_clave )
                        $validacion="User y pass correctos";
                    else
                        $validacion="Contraseña incorrecta";
                }
            }
            fclose($miarchivo);

            if ($validacion == null)
                $validacion = "El usuario no existe";
            
            return $validacion;
            

        }
        
        public static function CargarUsuarioJSON (Usuario $user){
            if (isset($user->_usuario) && isset($user->_clave) && isset($user->_mail))
            {
                $miarchivo = fopen("usuarios.json", "a");
                fwrite($miarchivo, json_encode($user)."\n");
                fclose($miarchivo);
                
                $ruta="usuario/fotos/";
                $nombreFoto="$user->_mail";
                CargarFoto($ruta,$nombreFoto,"foto");

                /*$destino = "usuario/fotos/".$user->_id.".jpg";
                move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);*/
                return true;
            }
            else
            {
                return false;
            }
        }
        

        public static function ListarJSON($lista){
           $miarchivo = fopen("$lista.json", "r");
           $arUsers = array();
           $auxString;
           $auxDeco;
           $auxUser;

           while (!feof($miarchivo))
           {
               $auxString = fgets($miarchivo);
               if ($auxString)
               {
                $auxDeco = json_decode($auxString);
                $auxUser = new Usuario($auxDeco->_usuario,$auxDeco->_clave,$auxDeco->_mail,null,null,$auxDeco->_id);
                array_push($arUsers, $auxUser); 
               }
           }
           fclose($miarchivo);
           
           $str = "<ul>";
           
           for ($i = 0; $i < count($arUsers); $i++){
                $path = "usuario/fotos/".$arUsers[$i]->_id.".jpg";
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $img = "<img height='100' src='".$base64."'/>";

                $str .= "<li>".$arUsers[$i]->_usuario.",".$arUsers[$i]->_clave." ".$img."</li>";

            }
           $str .= "</ul>";

           return $str;

        }



        public static function CargarUsuarioBase($usuario, $base)
        {
			$sql = "INSERT INTO personas(Nombre, apellido, clave, email, fecha_de_aregistro, localidad) VALUES
                    ('$usuario->_usuario' ,'$usuario->_apellido','$usuario->_clave','$usuario->_mail','$usuario->_fechaRegistro','$usuario->_localidad')";

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso($base);
            $consulta =$objetoAccesoDato->RetornarConsulta($sql);
            $consulta->execute();
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
    	}


        public static function Listarbase($nombreBase){
            $arUsers = array();
            $auxString;
            $auxDeco;
            $auxUser;
            $str ="";

            $sql = "Select * From Personas";

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso($nombreBase); 
            $consulta =$objetoAccesoDato->RetornarConsulta($sql);
            $consulta->execute();			
            $arAssoc = $consulta->fetchAll(PDO::FETCH_ASSOC);

            //$str=ArmarListaAssoc($arAssoc);
            $str=ArmarTablaAssoc($arAssoc, "");
            return $str;

        }
 

        
        public static function ModificarClave($nombre, $clavenueva, $clavevieja, $mail,$base){
             $sql = "UPDATE personas 
                        SET clave = '$clavenueva'
                      WHERE nombre = '$nombre'
                        AND email = '$mail'
                        AND clave = '$clavevieja';";

             echo($sql);
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso($base);
             $consulta =$objetoAccesoDato->RetornarConsulta($sql);
             $consulta->execute();
             
             return "Se modificó su clave";
         }




    }



?>