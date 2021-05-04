/*Parte 10- Ejercicios PDO listados

Funciones de filtrado:
se deben realizar la funciones que reciban datos por parámetros y puedan
ejecutar la consulta para responder a los siguientes requerimientos

A. Obtener los detalles completos de todos los usuarios y poder ordenarlos
alfabéticamente de forma ascendente o descendente. hecho
B. Obtener los detalles completos de todos los productos y poder ordenarlos
alfabéticamente de forma ascendente y descendente. hecho
C. Obtener todas las compras filtradas entre dos cantidades.hecho

D. Obtener la cantidad total de todos los productos vendidos entre dos fechas.

E. Mostrar los primeros “N” números de productos que se han enviado. hecho

F. Mostrar los nombres del usuario y los nombres de los productos de cada venta.

G. Indicar el monto (cantidad * precio) por cada una de las ventas.

H. Obtener la cantidad total de un producto (ejemplo:1003) vendido por un usuario
(ejemplo: 104).

I. Obtener todos los números de los productos vendidos por algún usuario filtrado por
localidad (ejemplo: ‘Avellaneda’).

J. Obtener los datos completos de los usuarios filtrando por letras en su nombre o
apellido. hecho

K. Mostrar las ventas entre dos fechas del año. hecho

Nota: Organice el código de estas consultas de la manera que quiera , pero debe
tener las funcionalidades en clases y las llamadas desde un archivo .php
Respuestas:
las respuestas de GDB deberían tener una primer hoja con índice indicando el archivo y el
renglón que resuelve la consigna ej:
a :{ archivo :usuarios.php, renglón :66}
b:{ archivo :productos.php, renglón :666}
...etc. */

<?php 

include 'Clases/AccesoDatos.php';
include 'Clases/Productos.php';
include 'Clases/Usuario.php';
include 'Clases/Ventas.php';

$desc="DESC";
$asc="ASC";
/*
$array = usuario::TraerTodoLosUsuariosDESoASC($asc);

foreach($array as $user){
    echo $user->MostrarDatos();
}*/
/*
$arrayPro = producto::TraerTodoLosProductoDESoASC($asc);

foreach($arrayPro as $user){
    echo $user->MostrarDatos();
}*/
/*
$arrayVenta= venta::TraerTodoComprasEntredoscandidades(7 , 10);

foreach($arrayVenta as $venta){

    echo $venta->MostrarDatos();
}*/

/*   
no puede devolver el valor de la cantidad total vendidos.
$cantidad = venta::TotalProductoVendidosPorFecha("2020-07-00" ,"2021-02-00");

var_dump($cantidad);*/
/*
foreach($cantidad as $cant){
    echo "(sting)$cant";
}*/
/*
$arrayVenta = venta::MostrarProductoEnviados(5);

foreach($arrayVenta as $venta){
    echo $venta->MostrarDatos();
}*/
/*
$arrayVenta = venta::MostrarVentaEntreFechas("2020-07-19","2021-04-25");
foreach($arrayVenta as $venta){
    echo $venta->MostrarDatos();
}*/

/*
$arrayUser = usuario::ObtenerDatosUsuarioPorletras('n');

foreach($arrayUser as $user){
    echo $user->MostrarDatos();
}*/



?>