/*
Wilson Huallpa

Ejercicio 10 

Aplicación No 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.

*/
<h1>Ejercicio 10</h1>

<?php
$color = array("Verde", "Azul", "Negro");
$marca = array("Mapet", "Bic","Filgo");
$trazo = array("fino","grueso","mediano");
$precio = array (20, 35, 30, 30);

$lapiceras = array(array("Color" =>$color[rand(0,2)],"Marca" =>$marca[rand(0,2)],"Trazo" =>$trazo[rand(0,2)],"Precio" =>$precio[rand(0,3)]),
                    array("Color" =>$color[rand(0,2)],"Marca" =>$marca[rand(0,2)],"Trazo" =>$trazo[rand(0,2)],"Precio" =>$precio[rand(0,3)]),
                    array("Color" =>$color[rand(0,2)],"Marca" =>$marca[rand(0,2)],"Trazo" =>$trazo[rand(0,2)],"Precio" =>$precio[rand(0,3)]));

foreach($lapiceras as $i => $lapicera){
    echo "Lapicera ", ($i+1), " </br>";
    foreach($lapicera as $j =>$datos){
        echo $j, " : ", $datos ,"</br>";
    }
    echo "</br>";
}

?>


