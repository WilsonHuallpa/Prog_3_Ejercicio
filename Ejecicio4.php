/*
Huallpa Wilson

Ejercicio 4

Aplicación No 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.

*/

<h1>Ejercicio 4</h1>

<?php 


$operador = array('*','/','+','-');
$i = array_rand($operador, 1);
$op1 = mt_rand(1,9);
$op2 = mt_rand(1,9);


print("</br> $op1 $operador[$i] $op2 =  " );

switch($operador[$i]){
    case '+':
        echo $op1 + $op2;
        break;
    case '-':
        echo $op1 - $op2;
        break;
    case '/':
        if($op2 != 0 ){
            echo $op1 / $op2;
        }else{
            echo "No se puede dividir por 0";
        }
        break;
    case '*':
        echo $op1 * $op2;
        break;
}

?>