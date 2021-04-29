<?php
Class Helado{
    public $_sabor;
    public $_precioBruto;
    public $_precioFinal;
    public $_tipo;
    public $_cantidad;
    public $_id;

    public function __construct($sabor="", $precioBruto="", $tipo="", $cant=""){
        $this->_sabor = $sabor;
        $this->_precioBruto = $precioBruto;
        $this->_precioFinal = CalcularIva($precioBruto);
        $this->_tipo = $tipo;
        $this->_cantidad = $cant;
        $this->_id = rand(1,10000);
    }


    public static function CargarHelado($helado)
    {
        $helados = LeerJson("Helados.json");
        $heladoExiste = false;

        if($helado->_tipo != "crema" && $helado->_tipo != "agua"){
            return "Solo se pueden ingresar helados de crema o agua";
        }
        else
        {
            foreach($helados as $key=>$unHelado){
                if ($helado->_sabor == $unHelado->_sabor && $helado->_tipo == $unHelado->_tipo ){
                    $heladoExiste=true;
                    $helados[$key]->_cantidad += $helado->_cantidad;
                    $helados[$key]->_precioBruto = $helado->_precioBruto;
                    $helados[$key]->_precioFinal = CalcularIva($helado->_precioBruto);
                    PisarJson("Helados.json",$helados);
                    return "Se agregaron helados y se actualizo el precio";
                }
            }
            if (!$heladoExiste){
                CargarJson("Helados.json",$helado);
                return "Se cargo nuevo helado";
            }

        }
    }

    public static function ConsultaHelado ($sabor, $tipo){
        $helados = LeerJson("Helados.json");
        $haySabor = false;
        $hayTipo = false;
        $hayTipoSabor = false;

        foreach($helados as $unHelado){
            if ($unHelado->_tipo == $tipo && $unHelado->_sabor == $sabor)
                    $hayTipoSabor = true;

            if ($unHelado->_sabor == $sabor)
                $haySabor = true; 
            
            if ($unHelado->_tipo == $tipo){
                $hayTipo = true; 
            }
            
        }

        if ($hayTipoSabor){
            return "Si hay";
        }
        elseif(!$hayTipo && !$haySabor){
            return "No tenemos ni el tipo ni sabor de helado";
        }
        else
            return "no tenemos la combinacion deseada de tipo y sabor de helado";    
    }

    

        
    public static function RealizarVenta($venta){
       
            $arHelados = LeerJson("Helados.json");
            $resultado ="";
            $vender=false;

                    
            foreach($arHelados as $key=>$unHelado)
            {
                if ($unHelado->_sabor == $venta->_sabor && $unHelado->_tipo == $venta->_tipo && $unHelado->_cantidad >= $venta->_cantidad )
                {
                    $vender = true;
                        //Si hay helado y stock, se registra la venta y se disminuye el stock

                        $arHelados[$key]->_cantidad -= $venta->_cantidad;
                        PisarJson("Helados.json",$arHelados);

                        
                        //consulta                    
                        $sql = "INSERT INTO ventas(mail, sabor, tipo, cantidad, fecha, numpedido    ) VALUES
                        ('$venta->_mail' ,'$venta->_sabor','$venta->_tipo','$venta->_cantidad','$venta->_fecha','$venta->_numPedido')";
                        //pego en base de datos
                        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso("parcial");
                        $consulta =$objetoAccesoDato->RetornarConsulta($sql);
                        $consulta->execute();

                        //cargo foto
                        $nombreFoto=explode("@", $venta->_mail);
                        $destino = "ImagenesDeLaVenta/".$nombreFoto[0].".jpg";
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
                        $resultado="Venta realizada con exito";
                    }
                }

            if(!$vender)    
                $resultado = "No tenemos stock del producto deseado";

            return $resultado;
    
        }

        
        public static function CantidadVendida(){
            $sql = "Select sum(cantidad)
                    FROM	ventas";

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso("parcial"); 
            $consulta =$objetoAccesoDato->RetornarConsulta($sql);
            $consulta->execute();			
            $cantidadVendida = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $str = ArmarListaAssoc($cantidadVendida);

            return $str;

        }

        public static function Usuarios($fecha1, $fecha2){
            $sql = "Select  mail
                    FROM	ventas
                    Where   fecha between '$fecha1' and '$fecha2'";

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso("parcial"); 
            $consulta =$objetoAccesoDato->RetornarConsulta($sql);
            $consulta->execute();			
            $usuarios= $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $str = ArmarListaAssoc($usuarios);

            return $str;

        }

        public static function VentasUsuario($user){
            $sql = "Select  *
                    FROM	ventas
                    Where   mail = '$user'";

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso("parcial"); 
            $consulta =$objetoAccesoDato->RetornarConsulta($sql);
            $consulta->execute();			
            $Ventasusuarios= $consulta->fetchAll(PDO::FETCH_ASSOC);

            $str = ArmarListaAssoc($Ventasusuarios);

            return $str;

        }

        public static function VentasTipo($tipo){
            $sql = "Select  *
                    FROM	ventas
                    Where   tipo = '$tipo'";

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso("parcial"); 
            $consulta =$objetoAccesoDato->RetornarConsulta($sql);
            $consulta->execute();			
            $VentasTipo= $consulta->fetchAll(PDO::FETCH_ASSOC);

            $str = ArmarListaAssoc($Ventasusuarios);

            return $str;

        }


}
?>
