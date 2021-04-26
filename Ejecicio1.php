
<h1>Ejercicio 1</h1>

<?php

$num = 0;
$acumulador = 1;

while($num <= 1000){

    $num = $num + $acumulador;
    echo " </br> num: ", $num;
    $acumulador++;
}
echo "</br> cantidad de numero: ",$acumulador;
?>