/*
Wilson Huallpa

Ejercicio 9

Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.

*/
<h1>Ejercicio 9 </h1>

<?php
$color = array("Verde", "Azul", "Negro");
$marca = array("Mapet", "Bic","Filgo");
$trazo = array("fino","grueso","mediano");
$precio = array (20, 35, 30, 30);

$lapicera1 = array("Color" =>$color[rand(0,2)],"Marca" =>$marca[rand(0,2)],"Trazo" =>$trazo[rand(0,2)],"Precio" =>$precio[rand(0,3)]);

$lapicera2 = array("Color" =>$color[rand(0,2)],"Marca" =>$marca[rand(0,2)],"Trazo" =>$trazo[rand(0,2)],"Precio" =>$precio[rand(0,3)]);

$lapicera3 = array("Color" =>$color[rand(0,2)],"Marca" =>$marca[rand(0,2)],"Trazo" =>$trazo[rand(0,2)],"Precio" =>$precio[rand(0,3)]);

foreach($lapicera1 as $valor){
    echo " ", $valor;
}
echo "</br>";
foreach($lapicera2 as $valor){
    echo " ", $valor;
}
echo "</br>";
foreach($lapicera3 as $valor){
    echo " ", $valor;
}

?>

/*
foreach($lapicera1 as $i=> $lapicera){
    echo "Lapicera ", ($i+1), " </br>";
    foreach($lapicera as $j =>$datos){
        echo $j, ": ", $datos;

    }

    echo "</br>";
}*/