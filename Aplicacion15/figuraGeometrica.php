<?php

abstract class  FiguraGeometrica {

    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function _construct(){
        $_color="";
        $_perimetro = 0.0;
        $_superficie = 0.0; 
    }

    protected abstract function CalcularDatos();

    public abstract function Dibujar();

    public function GetColor(){

        return $this->_color;
    }
    public function SetColor($color){

        $this->_color=$color;
    }
    public function ToString(){

        $retorno = "Figuras Geometrica </br>";
        $retorno .= "Color: " . $this->_color . "</br>";
        $retorno .= "Perimetro: " . $this->_perimetro . "</br>";
        $retorno .= "Superficie: ". $this->_superficie . "</br>";
        $retorno .= "Dibujo: </br>\n" . $this->Dibujar();

        return $retorno;
    }

}


?>