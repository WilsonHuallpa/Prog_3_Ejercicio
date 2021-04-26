<?php
 include 'AccesoDatos.php';

class producto {


    public $id;
    public $_codigo;
    public $_nombre;
    public $_tipo;
    public $_stock;
    public $_precio;
    public $_fechaDeIngreso;
    public $_fechaDeMOdificacion;

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

    public function ModificarProductoParametros()
    {
           $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
           $consulta =$objetoAccesoDato->RetornarConsulta("
               UPDATE producto
               set codigo_de_barra ='$this->_codigo',
               nombre ='$this->_nombre',
               tipo ='$this->_tipo', 
               stock ='$this->_stock', 
               precio ='$this->_precio', 
               fecha_de_creacion ='$this->_fechaDeIngreso', 
               fecha_de_modificacion ='$this->_fechaDeMOdificacion' 
               WHERE id = '$this->id'");
           return $consulta->execute();
    }

    public function InsertarElProductoParametros()
    {
               $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
               $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into producto (codigo_de_barra,nombre,tipo,stock,precio,fecha_de_creacion,fecha_de_modificacion)values(:_codigo,:_nombre,:_tipo,:_stock,:_precio,:_fechadecreacion,:_fechademodificacion)");
               $consulta->bindValue(':_codigo',$this->_codigo, PDO::PARAM_INT);
               $consulta->bindValue(':_nombre', $this->_nombre, PDO::PARAM_STR);
               $consulta->bindValue(':_tipo', $this->_tipo, PDO::PARAM_STR);
               $consulta->bindValue(':_stock', $this->_stock, PDO::PARAM_STR);
               $consulta->bindValue(':_precio', $this->_precio, PDO::PARAM_INT);
               $consulta->bindValue(':_fechadecreacion', $this->_fechaDeIngreso, PDO::PARAM_STR);
               $consulta->bindValue(':_fechademodificacion', $this->_fechaDeMOdificacion, PDO::PARAM_STR);
               $consulta->execute();		
               return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public function InsertarElCdParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values(:titulo,:cantante,:anio)");
				$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
				$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
				$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
    
	public static function TraerUnProducto($codigo) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, codigo_de_barra as _codigo, nombre as _nombre,tipo as _tipo, stock as _stock, precio as _precio, fecha_de_creacion as _fechaDeIngreso, fecha_de_modificacion as _fechaDeMOdificacion from producto where codigo_de_barra = $codigo");
			$consulta->execute();
			$ProductBuscado= $consulta->fetchObject('producto');
			return $ProductBuscado;					
	}

}


?>