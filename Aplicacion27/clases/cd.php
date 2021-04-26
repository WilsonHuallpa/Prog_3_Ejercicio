<?php
class usuario
{
	public $id;
 	public $nombre;
	public $apellido;
	public $clave;
	public $email;
	public $localidad;
	public $fechaDeRegistro;

	public function __construct($nombre,$clave,$mail,$destino,$id = null,$fechaRegistro = null){

        $this->_nombre = $nombre;
        
        $this->_clave = $clave;
        $this->_mail = $mail;
        $this->_destino = $destino;
        $this->SetID($id);
        $this->SetFecha($fechaRegistro);
       
    }




  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}
	
	 public function InsertarElCdParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,apellido,clave,mail,fecha_de_registro,localidad)values(:_nombre,:_apellido,:_clave,:_mail,:_fecha_de_registro,:_localidad)");

				$consulta->bindValue(':_nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':_apellido', $this->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':_clave', $this->clave, PDO::PARAM_INT);
				$consulta->bindValue(':_mail', $this->clave, PDO::PARAM_STR);
				$consulta->bindValue(':_fecha_de_registro', $this->cantante, PDO::PARAM_STR);
				$consulta->bindValue(':_localidad', $this->cantante, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 

}