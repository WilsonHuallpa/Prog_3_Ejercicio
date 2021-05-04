/*
wilson huallpa
Aplicación No 31 (RealizarVenta BD )
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en las clases

 */

 <h1>Aplicacion 31</h1>

 <?php

include 'Clases/AccesoDatos.php';
include 'Clases/Productos.php';
include 'Clases/Usuario.php';
include 'Clases/Ventas.php';

if(isset($_POST['CodigoDeBarra']) && isset($_POST['IdUsuario']) && isset($_POST['Item'])){

    $codigoProduco = $_POST['CodigoDeBarra'];
    $idUsuario = $_POST['IdUsuario'];
    $cantidadItem = $_POST['Item'];

    $usuario = usuario::TraerUnUsuario($idUsuario);
    $producto = producto::TraerUnProducto($codigoProduco);

    if($usuario != false && $producto != false){

        if($producto->_stock > $cantidadItem){

            $unaVenta = new venta();
            $unaVenta->_idProducto = $producto->_id;
            $unaVenta->_idUsuacio = $idUsuario;
            $unaVenta->_cantidad = $cantidadItem;
            $unaVenta->_fecha = date("Y/m/d");
            $ultimaItem = $unaVenta->InsertarElVentaParametros();
            $producto->_stock -= $cantidadItem;
            $modifaciones = $producto->ModificarProductoParametros();

            echo $modifaciones,"\n";
            echo $ultimaItem;
        }else{
            echo "No hay stock \n";
        }
        echo "existen los producto";

    }else{
        echo "No exite los productos";

    }

}


 ?>