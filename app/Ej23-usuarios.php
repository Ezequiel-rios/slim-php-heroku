<?php
    class Usuario
    {
        public $usuario;
        public $clave;
        public $mail;

        public static function ValidarUsuario (Usuarios $user)
        {
            
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

        public static function CargarUsuario (Usuarios $user)
        {
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

        public static function Listar($lista)
        {
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

        public function VerificarLogin($user)
        {
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


    }
?>