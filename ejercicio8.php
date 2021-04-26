/*
Wilson Huallpa

Ejercicio 8

Aplicación No 8 (Carga aleatoria)
Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';


 */
 <h1> Ejercicio 8</h1>
 <?php

 $v = array(90 => 1, 7 => 30, 'e' => 99, 'hola' => "mundo");

 var_dump($v);
 
 foreach($v as $valor){
     echo "-", $valor;
 }

 ?>

