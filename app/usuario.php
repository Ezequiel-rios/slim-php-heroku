<?php
    include 'AccesoDatos.php';
    

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
            
            if ($id == "")
                $this->_id = rand();         //este dato es un poco conflictivo con la parte de base de datos
            else
                $this->_id = $id;         
            
                $this->_fechaRegistro = date("d.m.y");
            $this->_apellido = $a;
            $this->_localidad = $l;
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
                $destino = "usuario/fotos/".$user->_id.".jpg";
                move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
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



        public static function CargarUsuarioSQL ()
        {
   			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values('$this->titulo','$this->cantante','$this->año')");
			$consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
		 }

    }



?>