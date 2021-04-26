

<?php 

include 'AccesoDatos.php';
class usuario {

    public $nombre;
    public $apellido;
    public $clave;
    public $mail;
    public $fechaDeRegistro;
    public $localidad;
  

    public function __construct($_nombre = null, $_apellido = null,$_clave = null,$_mail = null,$_localidad = null){

        if($_nombre != null && $_apellido != null && $_clave != null && $_mail != null && $_localidad != null){
            $this->nombre = $_nombre;
            $this->apellido = $_apellido;
            $this->clave = $_clave;
            $this->mail = $_mail;
            $this->localidad = $_localidad;
            $this->fechaDeRegistro = date ("Y-m-d");
        }
        
     }

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
	public static function TraerTodoLosUsuario()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre as nombre, apellido as apellido, clave as clave, mail as mail, localidad as localidad , fecha_de_registro as fechaDeRegistro from usuario");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
	}

    
	public static function TraerElMaildeUsuario($_mail) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, mail as '$_mail' from usuario WHERE mail=:_mail");
			$consulta->bindValue(':mail', $_mail, PDO::PARAM_STR);
			$consulta->execute();
			//$cdBuscado= $consulta->fetchObject('cd');
      		return $consulta->rowCount();					
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
