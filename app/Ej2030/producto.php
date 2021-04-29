<?php
    class Producto
    {
        public $_codBarras;
        public $_nombre;
        public $_tipo;
        public $_stock;
        public $_precio;
        public $_id;


        public function __construct($cb, $n, $t, $s, $p, $id=null)
        {
            $this->_codBarras = $cb;
            $this->_nombre = $n;
            $this->_tipo = $t;
            $this->_stock = $s;
            $this->_precio = $p;
            if ($id == "")
                $this->id = rand(1,10000);         //este dato es un poco conflictivo con la parte de base de datos
            else
                $this->id = $id;  
        }

        
        public static function IngresarProducto ($producto){

            $arProductos = LeerJson("productos.json");
            $resultado ="";

            foreach($arProductos as $key=>$auxProd){
                if ($producto->_codBarras == $auxProd->_codBarras){
                    
                    $arProductos[$key]->_stock += $producto->_stock;
                    $resultado ="Actualizado";

                }
            }

            if($resultado == ""){
                CargarJson("productos.json", $producto);
                $resultado = "Ingresado";
            }
            elseif($resultado == "Actualizado"){
                PisarJson("productos.json", $arProductos);
            }
            else
                $resultado = "No se pudo guardar";

            return $resultado;
            
        }








    }
?>
