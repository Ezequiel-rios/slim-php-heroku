<?php

    class Venta
    {
        public $_mail;
        public $_sabor;
        public $_tipo;
        public $_cantidad;
        public $_fecha;
        public $id;
        public $numPedido;
                
        public function __construct($mail, $sabor, $tipo, $cantidad, $fecha="", $idVenta="", $numPed ="")
        {
            $this->_mail = $mail;
            $this->_sabor = $sabor;
            $this->_tipo = $tipo;
            $this->_cantidad = $cantidad;

            if ($numPed=="")
            $this->_numPedido = rand(1,10000) ;

            $this->_fecha = date("y.m.d");

        }



    }
?>