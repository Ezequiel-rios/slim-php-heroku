<?php
    class Venta
    {
        public $_idVenta;
        public $_codBarras;
        public $_idUsuario;
        public $_cantidad;
        public $_fecha;
        
        public function __construct($codBarras, $idUsuario, $cantidad, $fecha="", $idVenta="")
        {
            $this->_codBarras = $codBarras;
            $this->_idUsuario = $idUsuario;
            $this->_cantidad = $cantidad;
            $this->_fecha = date("d.m.y");

            if ($idVenta == "")
                $this->idVenta = rand(1,10000);         //este dato es un poco conflictivo con la parte de base de datos
            else
                $this->id = $idVenta;  
        }

        
        public static function RealizarVenta ($venta){

            $arProductos = LeerJson("productos.json");
            $arUsuario = LeerJson("usuarios.json");
            $resultado ="";
            $existeProd=false;
            $existeUsuario=false;

            foreach($arUsuario as $auxUsuario){
                if ($venta->_idUsuario == $auxUsuario->_id)
                    $existeUsuario=true;
                    
            }

            if($existeUsuario){
                foreach($arProductos as $key=>$auxProd){
                    if ($venta->_codBarras == $auxProd->_codBarras){
                        $existeProd=true;
                        if ($auxProd->_stock >= $venta->_cantidad){
                            //Si hay stock, se registra la venta y se disminuye el stock
                            CargarJson("ventas.json",$venta);
                            $arProductos[$key]->_stock -= $venta->_cantidad;
                            PisarJson("productos.json",$arProductos);
                            $resultado="Venta realizada con exito";
                        }
                        else{
                            $resultado = "Stock insuficiente para la venta. El stock actual es de $auxProd->_stock unidades.";
                        }
                    }
                }
            }
            else{
                $resultado="El usuario no existe en la base de datos";
            } 

            if(!$existeProd)
                $resultado = "El producto no se encuentra en nuestra base de datos";

            return $resultado;
            
        }




    }
?>
