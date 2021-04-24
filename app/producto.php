<?php
    class Usuario
    {
        public $_codBarras;
        public $_nombre;
        public $_tipo;
        public $_stock;
        public $_precio;

        //(isset($_POST["barras"]) && isset($_POST["nombre"]) && isset($_POST["tipo"])&& isset($_POST["stock"])&& isset($_POST["precio"]) )

        public function __construct($b, $n, $t, $s, $p)
        {
            $this->usuario = $u;
            $this->clave = $c;
            $this->mail = $m;
            $this->id = rand();
            $this->fechaRegistro = date("d.m.y");
    
        }

        public static function ValidarUsuario (Usuarios $user){
            
            if (isset($user->usuario) && isset($user->clave) && isset($user->mail))
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
            if (isset($user->usuario) && isset($user->clave) && isset($user->mail))
            {
                $miarchivo = fopen("usuarios.csv", "a");
                fwrite ($miarchivo, "$user->usuario, $user->clave, $user->mail \n");
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
              
                if ($aux && $aux[0] == $user->usuario)
                {
                    if ($aux[1] == $user->clave )
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
            if (isset($user->usuario) && isset($user->clave) && isset($user->mail))
            {
                $miarchivo = fopen("usuarios.json", "a");
                fwrite($miarchivo, json_encode($user)."\n");
                fclose($miarchivo);
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
                $auxUser = new Usuario($auxDeco->usuario,$auxDeco->clave,$auxDeco->mail);
                array_push($arUsers, $auxUser); 
               }
           }
           fclose($miarchivo);

           $str = "<ul>";
           for ($i = 0; $i < count($arUsers); $i++)
           {
               $str .= "<li>".$arUsers[$i]->usuario.",".$arUsers[$i]->clave."</li>";
           }
           $str .= "</ul>";
           return $str;

         }




    }
?>
