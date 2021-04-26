

<?php 


class usuario {


   public $_fechaRegistro;
   public $_nombre;
   public $_clave;
   public $_mail;
   public $_id;
   public $_destino;

   
   public function __construct($nombre,$clave,$mail,$destino,$id = null,$fechaRegistro = null){

        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
        $this->_destino = $destino;
        $this->SetID($id);
        $this->SetFecha($fechaRegistro);
       
    }


    // Metododos Getter
    public function GetID(){
        return $this->_id;
    }
    public function GetNombre(){

        return $this->_nombre;
    }
    public function GetMail(){

        return $this->_mail;
    }
    public function GetClave(){

        return $this->_clave;
    }
    public function GetFecha(){

        return $this->_fechaRegistro;
    }
    public function GetDestino(){

        return $this->_destino;
    }

    public function SetID($valor){
        
        if($valor === null){
           $this->_id = rand(1,10000); 
        }else{
           $this->_id = $valor;
        }
    }

    public function SetNombre($valor){
        $this->_nombre = $valor;
    }
    public function SetMail($valor){
        $this->_mail = $valor;
    }
    public function SetClave($valor){
        $this->_clave = $valor;
    }
    public function SetFecha($valor){
        if($valor === null){
            $this->_fechaRegistro = date("Y / m / d");
        }else{
            $this->_fechaRegistro = $valor;
        }
       
    }
    public function SetDestino($valor){

        $this->_destino = $valor;
    }

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

}

?>
