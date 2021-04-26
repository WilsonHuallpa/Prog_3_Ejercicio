<?php

include 'Aplicacion17.php';

class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial,$precioPorHora = 0){
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->auto = array();
    }
    public function MonstrarGarage(){

        $strStrig = "Razon Social= ".$this->_razonSocial."</br>";
        $strStrig .= "Precio por Hora= ".$this->_precioPorHora."</br>";

        foreach ($this->_autos as $i => $value) {
            $strStrig.= "auto" . $i;
            $strStrig .= Auto::MostrarAuto($value);
        }

        return $strStrig;
    }
    public function Equals($auto){
        $cantidad;
        if (is_a($auto,"Auto")) {
            $cantidad = $this->_autos.count();
            //continuarr.....
            if($cantidad > 0) {
                for ($i=0; $i < $cantidad ; $i++) { 
                    if($this->_autos[i] == $auto){
                        return true;
                        break;
                    }
                }
            }
            return false;
        }
    }
    public function Add($auto){
        if(!($this->Equals($auto))){
            array_push($this->autos, $auto);
        }else {
            echo "El auto ya exite en el garage.";
        }
    }
    public function Remove($auto){

        $index = -1;
        if($this->Equals($auto)){
            foreach ($this->_autos as $i => $value) {
                if($value == $auto){
                    $index = $i;
                    break;
                }
            }
            if($index != -1){
                unset($this->_autos[$index]);
            }

        }else {
            echo "NO exite el auo.";
        }

    }  

}

$auto1 = new Auto("TOYOTA","GRIS");
$auto2 = new Auto("TOYOTA","GRIS");
$auto3 = new Auto("WOLSVAGEN","NEGRO", 200);
$auto4 = new Auto("WOLSVAGEN","NEGRO", 300);
$auto5 = new Auto("FERRARI","ROJO", 300.000, date("Y / m /d"));

$garage = new Garage("monotributista", 30);

$garage->Add($auto1);
$garage->Add($auto3);

echo $garage->MonstrarGarage();

$garage->Remove($auto1);

echo $garage->MonstrarGarage();

?>