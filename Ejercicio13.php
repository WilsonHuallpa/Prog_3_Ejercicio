/*
Wilson huallpa

Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.

 */

 <h1>Ejercicio 13 </h1>

 <?php
    
    $string = "Parciaaal";
    $cant = 12;


    $resul = ValidarCantidad($string, $cant);

    if($resul == 1 ){
        echo " la palabra pertenece a algun elemento del listado";
    }else{
        echo "La palabra no petenece al listado";
    }
    

    function ValidarCantidad($palabra, $max){

        $cant = strlen($palabra);

        if( $cant <= $max && ValidarPalabras($palabra) ){
            return 1 ;
        }else{
            return 0;
        }
    }
    
    function ValidarPalabras($p){

        switch($p){
            case "Recuperatorio":
            case "Parcial":
            case "Programacion":
                return true;
            break;
            default:
                return false;
            break;
        }
    }

 ?>