/*
wilson huallpa
Aplicación No 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
carga los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en las clases

 */

 <h1>Aplicacion 26</h1>

 <?php

include 'Clases/Productos.php';
include 'Clases/Usuario.php';

if(isset($_POST['CodigoDeBarra']) && isset($_POST['IdUsuario']) && isset($_POST['Item'])){


    $arrayUser;
    $arrayProc;
    if(usuario::VerificarUser($arrayUser, $_POST['CodigoDeBarra']) &&  ){

    }


}


 ?>