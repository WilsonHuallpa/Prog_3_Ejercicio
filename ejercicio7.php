/*
Wilson Huallpa

Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.

 */

 <h1>Ejercicio 7 </h1>
 <?php

$vec = array();
$i = 0;
do{
    $num = rand(0,100);
    if($num%2 != 0){
        $vec[] = $num;
        $i = $i + 1;
    }
}while($i < 10);

for($j = 0; $j < 10 ; $j++ ){
    echo "<br/>", $vec[$j];
}
echo "<br/>";
foreach($vec as $valor){
    echo "<br/>", $valor;
}
echo "<br/>";
$index = 0;
while ($index < count($vec)){
    echo "<br/>", $vec[$index];
    $index = $index +1;

}
 ?>