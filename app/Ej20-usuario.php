<?php
    class Usuario
    {
        public $usuario;
        public $clave;
        public $mail;

        public static function ValidarUsuario (Usuario $user)
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

        public static function CargarUsuario (Usuario $user)
        {
            if (isset($user->usuario) && isset($user->clave) && isset($user->mail))
            {
                $miarchivo = fopen("usuarios.csv", "w");
                fwrite ($miarchivo, "$user->usuario,$user->clave,$user->mail \n");
                fclose($miarchivo);
                echo "Usuario agregado con exito";
            }
            else
            {
                echo "faltan datos";
            }
        }
    }
?>