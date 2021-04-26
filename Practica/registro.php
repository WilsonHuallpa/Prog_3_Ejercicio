

<?php 


class usuario {

   private $nombre;
   private $clave;
   private $mail;


   public function __construct($N,$C,$M){

        $this->nombre = $N;
        $this->clave = $C;
        $this->mail = $M;
    }

    public function Tostring(){

       return $this->nombre.",".$this->clave.",".$this->mail."\n";
    }

    public static function LeerArchivoscsv($strArchivo){

        $ar = fopen($strArchivo, "r");

        $arrayUser = array();

        if($ar != false){

            while (!feof($ar)){
    
                $linea = fgets($ar);

                if(!empty($linea)){

                    $datos = explode(",",$linea);
                    $nombre = $datos[0];
                    $clave = $datos[1];
                    $mail = $datos[2];

                    $usuario = new usuario($nombre, $clave, $mail);
                    array_push($arrayUser,$usuario);
                }
            }
            fclose($ar);
            return $arrayUser;
        }else{
            return "se produjo un error al abrir el archivo.";
        }

        /*$ar = fopen($strArchivo, "r");

        if($ar != false){

            $arrayUser = array();
            
            while (!feof($ar)){
    
                if(feof($ar)){
                    break;
                }
                $buffer = fgets($ar);

                array_push( $arrayUser, explode(',',$buffer));
            }
            fclose($ar);

        }else{
            return "se produjo un error al abrir el archivo.";
        }
      
        return $arrayUser;*/

    }

    public static function DibujarListado($strArray){


        print("<ul>");
            foreach($strArray as $user){
                print("<li>$user->nombre</li>");
                print("<li>$user->clave</li>");
                print("<li>$user->mail</li>");
            }
            print("</ul>");

    }

}
/*
    if(isset($_POST['_nombre']) && isset($_POST['_clave']) && isset($_POST['_mail'])){

        $persona1 =  new usuario($_POST['_nombre'],$_POST['_clave'],$_POST['_mail']);

        $archivo = fopen("usuarios.csv", "a");

        if(fwrite($archivo, $persona1 ->Tostring(). "\n") > 0){
        
            echo "se guardo el registro";
        }else{
            echo "no se guardo";
        }
        fclose($archivo);
    }else{
        echo "no valido";
    }
    */
?>
