

<?php 

include 'AccesoDatos.php';
class usuario {

    public $nombre;
    public $apellido;
    public $clave;
    public $email;
    public $fechaDeRegistro;
    public $localidad;
    

    public function __construct($_nombre, $_apellido,$_clave,$_mail,$_localidad){

       $this->nombre = $_nombre;
       $this->apellido = $_apellido;
       $this->clave = $_clave;
       $this->mail = $_mail;
       $this->localidad = $_localidad;
       $this->fechaDeRegistro = date ("Y-m-d");
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


    // Metododos Getter
   
    public function GetNombre(){

        return $this->nombre;
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

  /*  public function Tostring(){

       return $this->nombre.",".$this->_clave.",".$this->_mail. ",".$this->_fechaRegistro .",".$this->_destino. "\n";
    }*/

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
    
}

?>
