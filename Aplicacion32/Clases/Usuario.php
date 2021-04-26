

<?php 


class usuario {

   public $_id; 
   public $_nombre;
   public $_apellido;
   public $_clave;
   public $_mail;
   public $_fechaRegistro;
   public $_localidad;


    // Metododos Getter

    public function Tostring(){

       return $this->_nombre.",".$this->_clave.",".$this->_mail. ",".$this->_fechaRegistro .",".$this->_destino. "\n";
    }

    public static function GuardarJson($userArray){
        //JSON_FORCE_OBJECT fuerza el array a ser traducido en un objeto.
        $json_string = json_encode($userArray);

        $handler = fopen("Archivos/usuarios.json", "a");

        if(fwrite($handler,$json_string . "\n") > 0){
            echo "se guardo el registro";
        }else{
            echo "no se guardo";
        }
        fclose($handler);
    }
    public static function LeerArchivosJson($ArchivoJson){


        $archivo = fopen($ArchivoJson, "r");
        $arrayUser = array();

        if($archivo != false){

            while (!feof($archivo)){
    
                $linea = fgets($archivo);


                if(!empty($linea)){

                    $datos = json_decode($linea,true);
                    $fechaRegistro = $datos['_fechaRegistro'];
                    $nombre = $datos['_nombre'];
                    $clave = $datos['_clave'];
                    $mail = $datos['_mail'];
                    $id =$datos['_id'];
                    $destino = $datos['_destino'];

                    $usuario = new usuario($nombre, $clave, $mail, $destino, $id, $fechaRegistro);
                    array_push($arrayUser,$usuario);
                }
            }
            fclose( $archivo);
            return $arrayUser;
        }else{
            return "se produjo un error al abrir el archivo.";
        }
    }

    public static function DibujarListado($arrayuser){

        print("<ul>");
        foreach($arrayuser as $i => $user){

                echo "<li> usuario ", ($i + 1), "</li>";
                print("<li>". $user->GetNombre() . "</li>");
                print("<li>".$user->GetClave()."</li>");
                print("<li>".$user->GetMail() ."</li>");
                print("<li>".$user->GetFecha() ."</li>");
                print("<li>".$user->GetID() ."</li>");
                print("<li>".$user->GetDestino() ."</li>");
        }
        print("</ul>");
    }

    public static function TraerUnUsuario($clave) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id as _id, nombre as _nombre, apellido as _apellido, clave as _clave, mail as _mail, fecha_de_registro as _fechaRegistro, localidad as _localidad from usuario where clave = $clave");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('usuario');
			return $cdBuscado;					
	}
    public function ModificarUsuarioParametros()
    {
           $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
           $consulta =$objetoAccesoDato->RetornarConsulta("
               update usuario 
               set clave=:_clave
               WHERE id=:_id");
           $consulta->bindValue(':_id',$this->_id, PDO::PARAM_INT);
           $consulta->bindValue(':_clave',$this->_clave, PDO::PARAM_INT);
           return $consulta->execute();
    }
}

?>
