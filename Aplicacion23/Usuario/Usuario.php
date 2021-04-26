

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
