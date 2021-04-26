/*
wilson huallpa

Ejercicio 11

Aplicación No 11 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función
que las calcule invocando la función pow).

 */
<h1>Ejercicio 11</h1>
 <?php


    
    echo "<table border=1>";
    for($n1=1; $n1<= 4; $n1++){
        echo "<tr>";
        for($n2=1; $n2<=4; $n2++){
            echo "<td>". potencia($n1,$n2) . "</tb>";
        }
        echo "</tr>";
    }
    echo "</table>";

    function potencia ($num1, $num2){
        $resultado= pow($num1,$num2);
        return $resultado;
    }

 ?>