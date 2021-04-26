/*
wilson Huallpa

Ejerciocio 17

 */

<h1>Aplicacion 17 </h1>
<?php


class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;


    public function __construct($marca, $color, $precio = 0, $fecha = "--/--/--"){
 
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;

    }

    public function AgregarImpuestos($impuesto){
        $this->_precio += $impuesto;
    }

    public static function MostrarAuto($auto){

        if (is_a($auto,"Auto")) {
            return $auto->_color."***".$auto->_marca."***".$auto->_precio."***".$auto->_fecha; 
        }else {
            return "ERROR... no pertenece a clase auto.";
        }
    }

    public function Equals($auto){

        if (is_a($auto,"Auto")){
            if ($this->_marca == $auto->_marca){
                return "true";
            }else{
                return "false";
            }
        }else {
            return "ERROR... no pertenece a clase auto.";
        }
    }
    public static function Add($autoUno,$autoDos){

        $importeTotal = 0;
        if (is_a($autoUno,"Auto") && is_a($autoDos,"Auto")) {

            if(($autoUno->Equals($autoDos)) && ($autoUno->_color == $autoDos->_color)){
                
             $importeTotal = $autoUno->_precio + $autoDos->_precio;
             return  $importeTotal;

            }else {
                echo "<br> No son el mismo tipo de auto...";
                return $importeTotal;
            }
            
        }else {
        return "ERROR... no pertenece a clase auto.";
        }
    }



}

/* 
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
*/
/*
$auto1 = new Auto("TOYOTA","GRIS");
$auto2 = new Auto("TOYOTA","GRIS");
$auto3 = new Auto("WOLSVAGEN","NEGRO", 200);
$auto4 = new Auto("WOLSVAGEN","NEGRO", 300);
$auto5 = new Auto("FERRARI","ROJO", 300.000, date("Y / m /d"));

//● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.

$auto5->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto3->AgregarImpuestos(1500);

echo "<br> Se agrega 1500 de impuesto a estos auto. <br>";
echo "<br>", Auto::MostrarAuto($auto5);
echo "<br>", Auto::MostrarAuto($auto4);
echo "<br>", Auto::MostrarAuto($auto3);

//● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
echo "<br><br> Se suman los precios de los autos.";
$importeDouble = Auto::Add($auto1,$auto2);

echo "<br>", $importeDouble;

//● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.

echo "<br><br> Comparar auto";

echo "<br>", $auto1->Equals($auto2);

echo "<br>", $auto1->Equals($auto5);

//● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)

echo "<br><br> Monstrar objetos impares";

echo "<br>", Auto::MostrarAuto($auto1);
echo "<br>", Auto::MostrarAuto($auto3);
echo "<br>", Auto::MostrarAuto($auto5);

*/
?>