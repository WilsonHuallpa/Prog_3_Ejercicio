/*
wilson huallpa

Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
crear un objeto y utilizar sus métodos para poder verificar si es un producto existente,
si ya existe el producto se le suma el stock , de lo contrario se agrega.
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
 */

<h1>Aplicacion 30 </h1>
 <?php
 

 include 'Clases/Productos.php';

 
 if(isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['stock']) && isset($_POST['precio'])){


    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $stock =$_POST['stock'];
    $precio =  $_POST['precio'];

    if(is_numeric($codigo)){

        $unproducto =producto::TraerUnProducto($codigo);


        if($unproducto == null){

            $productonuevo =new producto();
            $productonuevo->_codigo=$codigo;
            $productonuevo->_nombre=$nombre;
            $productonuevo->_tipo=$tipo;
            $productonuevo->_stock=$stock;
            $productonuevo->_precio=$precio;
            $productonuevo->_fechaDeIngreso = date("Y/m/d");
            $productonuevo->_fechaDeMOdificacion = "0000-00-00";
    
            $UltimoId=$productonuevo->InsertarElProductoParametros();
            echo $UltimoId , "\n";
    
            echo "Ingresado un producto nuevo \n";
    
        }else{
            $unproducto->_stock += $stock;
            $unproducto->_fechaDeMOdificacion = date ("Y-m-d");
            $cantidadDeAfectadas = $unproducto->ModificarProductoParametros();
            print("files afectadas : $cantidadDeAfectadas \n");
            print("Se Actualizo el stock del produco. $unproducto->_nombre");
        }

    }else{
        echo "ERROR... no es codigo no es numerico, no se pudo hacer la operacion";
    }
    }
    
 
 ?>