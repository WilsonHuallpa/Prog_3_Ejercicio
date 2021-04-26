/*
Huallpa Wilson

Ejercicio 6

Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.

 */


<h1>Ejercicio 6 </h1>

<?php

$vec = array(rand(1,9),rand(1,9),rand(1,9),rand(1,9),rand(1,9));
$resultado = 0;
$promedio;

foreach($vec as $valor){
   
    $resultado = $resultado + $valor;
    echo $valor,",";
}
echo " = ",$resultado;
$promedio= $resultado / 5;

echo "</br> Promedio: ",$promedio;

if($promedio > 6){
    echo "</br> Mayor a 6.";
}else if($promedio < 6){
    echo "</br> Menor a 6.";
}else {
    echo "</br> Es igual a 6.";
}
?>