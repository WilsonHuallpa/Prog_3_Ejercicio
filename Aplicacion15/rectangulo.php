<?php

class Rectangulo extends FiguraGeometrica {

    private $_ladoDos;
    private $_ladoUno;


    public function __construct($l1, $l2){

        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;
        $this->CalcularDatos();
    }

    protected function CalcularDatos(){
        $this->_superficie = $this->_ladoUno * this->ladoDos;
        $this->_perimetro = ($this->_ladoUno *2) + ($this->ladoDos * 2);
    }
    public function Dibujar(){

        $strRet = " ";

        for ( $altura = 0; $altura < $this->_ladoDos; $altura++ ) {
            for ( $base = 0; $base < $this->_ladoUno; $base++ ) {
                $strRet .= "*";
            }
            $strRet .= "\n<br>\n";
        }


        return $strRet;
    }
    
    /*
    public function ToString(){
        return "string";
    }
    */
}

?>