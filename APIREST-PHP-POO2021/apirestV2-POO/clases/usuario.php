<?php
class usuario
{
	public $id;
 	public $nombre;
  	public $mail;
  	public $clave;



  	public function BorrarUsuario()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from usuario 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public static function BorrarUsuarioPormail($mail)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from cds 				
				WHERE mail=:mail");	
				$consulta->bindValue(':mail',$mail, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }
	public function ModificarUsuario()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuario 
				set nombre='$this->nombre',
				mial='$this->mail',
				clave='$this->clave'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarUnUsuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,mail,clave)values('$this->nombre','$this->mail','$this->clave')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();

				// guarda una incriptacion de la clave de patito feo
	 }

	  public function ModificarUsuarioParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuario 
				set nombre=:_nombre,
				mail=:_mail,
				clave=:_clave
				WHERE id=:_id");
			$consulta->bindValue(':_id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':_nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':_mail', $this->mail, PDO::PARAM_STR);
			$consulta->bindValue(':_clave', $this->clave, PDO::PARAM_INT);
			return $consulta->execute();
	 }

	 public function InsertarElUserParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,mail,clave)values(:_nombre,:_mail,:_clave)");
				$consulta->bindValue(':_nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':_mail', $this->mail, PDO::PARAM_STR);
				$consulta->bindValue(':_clave', $this->clave, PDO::PARAM_INT);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 public function GuardarUsuario()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarUsuarioParametros();
	 		}else {
	 			$this->InsertarElUserParametros();
	 		}

	 }


  	public static function TraerTodoLosUsuario()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id as id,nombre as nombre, mail as mail,clave as clave from usuario");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
	}

	public static function TraerUnUsuario($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id as id, nombre as nombre, mail as mail,clave as clave from usuario where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('usuario');
			return $cdBuscado;				

			
	}
/*
	public static function TraerUnCdAnio($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=? AND jahr=?");
			$consulta->execute(array($id, $anio));
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}*/

	/*public static function TraerUnCdAnioParamNombre($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->bindValue(':id', $id, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $anio, PDO::PARAM_STR);
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}
	*/
	/*public static function TraerUnCdAnioParamNombreArray($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->execute(array(':id'=> $id,':anio'=> $anio));
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}
*/
	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->nombre."  ".$this->mial."  ".$this->clave;
	}

}