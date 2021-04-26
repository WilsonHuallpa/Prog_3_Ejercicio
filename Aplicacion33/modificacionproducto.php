/*
wilson huallpa

Aplicación No 33 ( ModificacionProducto BD)
Archivo: modificacionproducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
,
crear un objeto y utilizar sus métodos para poder verificar si es un producto existente,
si ya existe el producto el stock se sobrescribe y se cambian todos los datos excepto:
el código de barras .
Retorna un :
“Actualizado” si ya existía y se actualiza
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase


 */
 <h1>Aplicacion 33 </h1>

 <?php


include 'Clases/AccesoDatos.php';
include 'Clases/Productos.php';

if(isset($_POST['CodigoDeBarra']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['stock']) && isset($_POST['precio'])){

    $codigoProduc = $_POST['CodigoDeBarra'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];

 
    $producto = producto::TraerUnProducto($codigoProduc);

    if($producto != false){
        $producto->_nombre = $nombre;
        $producto->_tipo = $tipo;
        $producto->_stock = $stock;
        $producto->_precio = $precio;
        $producto->_fechaModificacion = date("Y/m/d");
        $modificacion = $producto->ModificarProductoParametros();
        print "Actualizado producto: $codigoProduc, se modifico:  $modificacion";

    }else{
        print "ERROR... $codigoProduc, no se pudo hacer";
    }

}
 ?>