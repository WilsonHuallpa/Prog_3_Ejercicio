/*
Wilson huallpa

Aplicación No 15 (Figuras geométricas)
La clase FiguraGeometrica posee: todos sus atributos protegidos, un constructor por defecto,
un método getter y setter para el atributo _color, un método virtual (ToString) y dos
métodos abstractos: Dibujar (público) y CalcularDatos (protegido).
CalcularDatos será invocado en el constructor de la clase derivada que corresponda, su
funcionalidad será la de inicializar los atributos _superficie y _perimetro.
Dibujar, retornará un string (con el color que corresponda) formando la figura geométrica del
objeto que lo invoque (retornar una serie de asteriscos que modele el objeto).
Ejemplo:
  *     *******
 ***    *******
*****   *******
Utilizar el método ToString para obtener toda la información completa del objeto, y luego
dibujarlo por pantalla.
Jerarquía de clases:

*/

<h1>Ejercicio 15</h1>

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

class Rectangulo extends FiguraGeometrica {

  private $_ladoDos;
  private $_ladoUno;


  public function __construct($l1, $l2){

      $this->_ladoUno = $l1;
      $this->_ladoDos = $l2;
      $this->CalcularDatos();
  }

  protected function CalcularDatos(){
      $this->_superficie = $this->_ladoUno * $this->ladoDos;
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
class Triangulo extends FiguraGeometrica{

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

$rect = new Rectangulo(5, 4);

print($rect->ToString());
print("<hr>");

$triang = new Triangulo(7, 4);

print($triang->ToString());
?>