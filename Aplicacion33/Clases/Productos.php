<?php

class producto {

    public $_id;
    public $_codigo;
    public $_nombre;
    public $_tipo;
    public $_stock;
    public $_precio;
    public $_fechaCreacion;
    public $_fechaModificacion;


    public static function AltaDeProducto($producto){

        $retono;
        $json_string = json_encode($producto);
        $handler = fopen("Archivos/productos.json", "a");

        if(fwrite($handler,$json_string . "\n") > 0){
            $retono = true;
        }else{
            $retono = false;
        }
        fclose($handler);
        return $retono;
    }

    public function VerificarProducto($arrayProducto){

        $exite = false;
        foreach($arrayProducto as $prod){

            if($prod->GetCodigo() == $this->GetCodigo()){

                $cantidad = $this->GetStock();
                $viejoStock = $prod->GetStock();
                $nuevoStock = $cantidad + $viejoStock;
                $prod->SetStock((string)$nuevoStock);
                $exite = true;
                break;
            }
        }
        return $exite;
    }

    public static function LeerArchivosJson($ArchivoJson){


        $archivo = fopen($ArchivoJson, "r");
        $arrayProducto = array();

        if($archivo != false){

            while (!feof($archivo)){
                $linea = fgets($archivo);
                if(!empty($linea)){

                    $datos = json_decode($linea, true);
                    $codigo = $datos['codigo'];
                    $nombre = $datos['nombre'];
                    $tipo = $datos['tipo'];
                    $stock = $datos['stock'];
                    $precio =$datos['precio'];

                    $producto = new producto($nombre, $tipo, $stock, $precio, $codigo);
                    array_push($arrayProducto,$producto);
                }
            }
            fclose($archivo);
            return $arrayProducto;
        }else{
            return null;
        }
    } 

    public static function TraerUnProducto($codigo) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id as _id, codigo_de_barra as _codigo, nombre as _nombre,tipo as _tipo, stock as _stock, precio as _precio, fecha_de_creacion as _fechaCreacion, fecha_de_modificacion as _fechaModificacion from producto where codigo_de_barra = $codigo");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('producto');
			return $cdBuscado;					
	}

    public function ModificarProductoParametros()
    {
           $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
           $consulta =$objetoAccesoDato->RetornarConsulta("
               update producto 
               set nombre=:nombre,
                tipo=:tipo,
                stock=:stock,
                precio=:precio,
                fecha_de_creacion=:fechacreacion,
                fecha_de_modificacion=:fechamodificacion
               WHERE id=:_id");
           $consulta->bindValue(':nombre',$this->_nombre, PDO::PARAM_STR);
           $consulta->bindValue(':tipo',$this->_tipo, PDO::PARAM_STR);
           $consulta->bindValue(':stock',$this->_stock, PDO::PARAM_INT);
           $consulta->bindValue(':precio',$this->_precio, PDO::PARAM_INT);
           $consulta->bindValue(':fechacreacion',$this->_fechaCreacion, PDO::PARAM_STR);
           $consulta->bindValue(':fechamodificacion',$this->_fechaModificacion, PDO::PARAM_STR);
           $consulta->bindValue(':_id',$this->_id, PDO::PARAM_INT);
           return $consulta->execute();
    }

}


?>