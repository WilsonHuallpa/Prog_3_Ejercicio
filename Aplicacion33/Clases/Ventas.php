<?php


class venta{


    public $_idProducto;
    public $_idUsuacio;
    public $_cantidad;
    public $_fecha;


    public function InsertarElVentaParametros()
    {
               $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
               $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into venta (id_producto,id_usuario,cantidad,fecha_de_venta)values(:idPro,:idUser,:cant,:fecha)");
               $consulta->bindValue(':idPro',$this->_idProducto, PDO::PARAM_INT);
               $consulta->bindValue(':idUser', $this->_idUsuacio, PDO::PARAM_INT);
               $consulta->bindValue(':cant', $this->_cantidad, PDO::PARAM_INT);
               $consulta->bindValue(':fecha', $this->_fecha, PDO::PARAM_STR);
               $consulta->execute();		
               return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
}

?>