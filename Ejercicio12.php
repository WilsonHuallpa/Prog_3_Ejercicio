/*
Wilson huallpa

Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.

 */
 <h1>Ejercicio 12</h1>

 <?php

    $cadena = "hola";

    echo InvertirPalbra($cadena);



    function InvertirPalbra($p){

        $longitud = strlen($p);
        $temporal;
        for ($izquierda = 0, $derecha = $longitud - 1; $izquierda < ($longitud / 2);
            $izquierda++, $derecha--) {
            $temporal = $p[$izquierda];
            $p[$izquierda] = $p[$derecha];
            $p[$derecha] = $temporal;
        }
        return $p;

    }

 ?>