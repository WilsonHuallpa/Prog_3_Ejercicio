<?php


class venta{


    public $_id;
    public $_idProducto;
    public $_idUsuario;
    public $_cantidad;
    public $_fecha;


    public function InsertarElVentaParametros()
    {
               $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
               $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into venta (id_producto,id_usuario,cantidad,fecha_de_venta)values(:idPro,:idUser,:cant,:fecha)");
               $consulta->bindValue(':idPro',$this->_idProducto, PDO::PARAM_INT);
               $consulta->bindValue(':idUser', $this->_idUsuario, PDO::PARAM_INT);
               $consulta->bindValue(':cant', $this->_cantidad, PDO::PARAM_INT);
               $consulta->bindValue(':fecha', $this->_fecha, PDO::PARAM_STR);
               $consulta->execute();		
               return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public static function TraerTodoComprasEntredoscandidades($min,$max)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id as _id , id_producto as _idProducto, id_usuario as _idUsuario, cantidad as _cantidad, fecha_de_venta as _fecha from venta WHERE cantidad >= $min AND cantidad <=$max ");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");		
	}
    public function MostrarDatos(){

        return $this->_idProducto.",".$this->_idUsuario.",".$this->_cantidad.",".$this->_fecha. "<br>";
    }

    /*
    public static function TotalProductoVendidosPorFecha($fecha1 ,$fecha2)
    {
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
             $consulta =$objetoAccesoDato->RetornarConsulta("select SUM(cantidad) as _cantidad from venta WHERE fecha_de_venta BETWEEN $fecha1 AND $fecha2 ");
            $consulta->execute();	
            return $consulta->fetchAll($total);
    }*/
    //no pude hacer
    public static function MostrarProductoEnviados($numero)
    {
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
             $consulta =$objetoAccesoDato->RetornarConsulta("select id as _id, id_producto as _idProducto , id_usuario as _idUsuario, cantidad as _cantidad, fecha_de_venta as _fecha from venta ORDER BY fecha_de_venta ? $numero ");
             //$consulta->execute(array("LIMIT"));
            // $consulta->execute();	
            return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");
    }

    //k
    public static function MostrarVentaEntreFechas($min,$max)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id as _id , id_producto as _idProducto, id_usuario as _idUsuario, cantidad as _cantidad, fecha_de_venta as _fecha from venta WHERE fecha_de_venta >= ? AND fecha_de_venta <= ? ");
			$consulta->execute(array($min, $max));			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");		
	}


    // SELECT id_producto, fecha_de_venta FROM venta ORDER BY fecha_de_venta LIMIT 3

}

?>