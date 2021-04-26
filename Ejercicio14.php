/*
Wilson huallpa

Aplicación No 14 (Par e impar)
Crear una función llamada esPar que reciba un valor entero como parámetro y devuelva TRUE
si este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función esImpar.

 */
 <h1>Ejercicio 14 </h1>

 <?php

   $numero = rand(1,100);

   echo "</br>",$numero;

   if(esPar($numero)){
     echo "</br> Es par";
   }else {
       echo "</br> es impar";
   }

    function esPar($num){

        if($num % 2 == 0){
            return true;
        }else if ( $num % 2 != 0){
            return false;
        }
    }

    function esImpar($num){

        if(!(esPar($num))){
            return true;
        }else {
            return false;
        }

    }

 ?>