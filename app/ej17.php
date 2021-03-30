<?php
/*Nestor Ezequiel Rios 
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:

_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto” por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo devolverá TRUE si ambos “Autos” son de la misma marca.

Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double
con la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5).
*/

class Auto 
{   
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($c, $p=0.00, $m, $f = "")
    {
        $this->_color = $c;
        $this->_precio = $p;
        $this->_marca = $m;
        $this->_fecha = $f;

    }
        
    public function AgregarImpuestos ($impuestos){
      $this->_precio += $impuestos;
    }
    
    public static function MostrarAuto ($auto){
      echo $auto->_color, "<br>";
      echo $auto->_precio, "<br>";
      echo $auto->_marca, "<br>";
      echo $auto->_fecha, "<br><br>";
    }
    public static function MostrarPrecio ($auto){
      echo $auto->_precio, "<br>";
    }


    public static function Equals ($auto, $auto2){
      if($auto->_marca == $auto2->_marca)
        return true;
      else
        return false;
    }

    public static function Add ($auto, $auto2){
      if($auto->_marca == $auto2->_marca && $auto->_color == $auto2->_color )
        return $auto->_precio + $auto2->_precio;
      else
        return 0;
    }

    public function __destruct(){}
     

}
/*
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5).*/

$autos = array();

$auto = New Auto("Rojo", 50000, "Ford", "29/03/1994");
array_push($autos, $auto);
$auto = New Auto("Azul", 45000, "Ford", "29/03/1992");
array_push($autos, $auto);
$auto = New Auto("Negro", 60000, "Fiat", "01/04/2000");
array_push($autos, $auto);
$auto = New Auto("Negro", 75000, "Fiat", "01/01/2002");
array_push($autos, $auto);
$auto = New Auto("Blanco", 95000, "Chery", "31/12/2007");
array_push($autos, $auto);

echo "<br>Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio:<br>";

Auto::MostrarPrecio($autos[2]);
Auto::MostrarPrecio($autos[3]);
Auto::MostrarPrecio($autos[4]);

$autos[2]->AgregarImpuestos(1500);
$autos[3]->AgregarImpuestos(1500);
$autos[4]->AgregarImpuestos(1500);

Auto::MostrarPrecio($autos[2]);
Auto::MostrarPrecio($autos[3]);
Auto::MostrarPrecio($autos[4]);


echo"<br><br><br>Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido. Se utiliza la funcion Add<br>";
echo Auto::Add($autos[0], $autos[1]), "<br>";


echo"<br><br><br>Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no. Se utiliza la funcion Equals<br>";

if(Auto::Equals($autos[0], $autos[1]))
  echo "Son de la misma marca<br>";
else
  echo "No son de la misma marca<br>";

if(Auto::Equals($autos[1], $autos[4]))
  echo "Son de la misma marca<br>";
else
  echo "No son de la misma marca<br>";

echo"<br><br><br>Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)<br>";

Auto::MostrarAuto($autos[0]);
Auto::MostrarAuto($autos[2]);
Auto::MostrarAuto($autos[4]);

?>