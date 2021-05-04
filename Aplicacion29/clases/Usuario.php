

<?php 


class usuario {

    public $_id;
    public $_nombre;
    public $_apellido;
    public $_clave;
    public $_mail;
    public $_fechaDeRegistro;
    public $_localidad;

    public function InsertarElUsuarioParametros()
    {
               $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
               $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,apellido,clave,mail,fecha_de_registro,localidad)values(:_nombre,:_apellido,:_clave,:_mail,:_fecha_de_registro,:_localidad)");

               $consulta->bindValue(':_nombre',$this->nombre, PDO::PARAM_STR);
               $consulta->bindValue(':_apellido', $this->apellido, PDO::PARAM_STR);
               $consulta->bindValue(':_clave', $this->clave, PDO::PARAM_INT);
               $consulta->bindValue(':_mail', $this->mail, PDO::PARAM_STR);
               $consulta->bindValue(':_fecha_de_registro', $this->fechaDeRegistro, PDO::PARAM_STR);
               $consulta->bindValue(':_localidad', $this->localidad, PDO::PARAM_STR);
               $consulta->execute();		
               return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
	
    public static function TraerUnUsuarioIdMail($mail,$clave) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  id as _id, nombre as _nombre, apellido as _apellido, clave as _clave, mail as _mail, fecha_de_registro as _fechaDeRegistro, localidad as _localidad from usuario  WHERE clave=? AND mail=?");
			$consulta->execute(array($clave, $mail));
			$cdBuscado= $consulta->fetchObject('usuario');
      		return $cdBuscado;				

			
	}
    

    // Metododos Getter
   
    public function GetNombre(){

        return $this->nombre;
    }
    public function GetApellido(){
        return $this->apellido;
    }
    public function GetMail(){

        return $this->mail;
    }
    public function GetClave(){

        return $this->clave;
    }
    public function GetFecha(){

        return $this->fechaDeRegistro;
    }
    public function GetLocalidad(){
        return $this->localidad;
    }

    public static function GuardarJson($userArray){

        $json_string = json_encode($userArray);

        $handler = fopen("Archivos/usuarios.json", "a");

        if(fwrite($handler,$json_string . "\n") > 0){

            echo "se guardo el registro";
            
        }else{
            echo "no se guardo";
        }
        fclose($handler);
    }
    /*
    public function mostrarDatos()
	{
	  	return $this->titulo."  ".$this->cantante."  ".$this->año;
	}*/
    public static function DibujarListado($arrayuser){

        print("<ul>");
        foreach($arrayuser as $i => $user){

                echo "<li> usuario ", ($i + 1), "</li>";
                print("<li>". $user->GetNombre() . "</li>");
                print("<li>". $user->GetApellido() . "</li>");
                print("<li>".$user->GetClave()."</li>");
                print("<li>".$user->GetMail() ."</li>");
                print("<li>".$user->GetFecha() ."</li>");
                print("<li>".$user->GetLocalidad() ."</li>");
        }
        print("</ul>");
    }
    
}

?>
