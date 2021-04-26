<?php

class Tringulo extends FiguraGeometrica{

    private $_altura;
    private $_base;

    public function __construct($b, $h){

        $this->_base = $b;
        $this->_altura = $h;
        $this->CalcularDatos();
    }
    protected function CalcularDatos(){
        $this->__superficie = ($this->_base * $this->_altura) / 2;
        $this->__perimetro = 0;

    }
    public function Dibujar(){
        $strRet = "";
        $asteriscosAux = 1;
        for ( $alturaFor = 0; $alturaFor < $this->_altura; $alturaFor++ ) {

            for ( $espaciosVacios = 0; $espaciosVacios < ($this->_base - $alturaFor); $espaciosVacios++ ) {
                $strRet .= "-";
            }

            for ( $asteriscos = 0; $asteriscos < $asteriscosAux; $asteriscos++ ) {
                $strRet .= "*";
            }

            for ( $espaciosVacios = 0; $espaciosVacios < ($this->_base - $alturaFor); $espaciosVacios++ ) {
                $strRet .= "-";
            }
            $strRet .= "\n<br>\n";
            $asteriscosAux += 2;
        }

        return $strRet;

    }
    /*
    public function ToString(){
        return "string";
    }*/

}
?>