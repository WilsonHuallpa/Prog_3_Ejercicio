

<?php 


class usuario {

   private $nombre;
   private $clave;
   private $mail;
   private static $id;


   public function __construct($N,$C,$M){

        $this->nombre = $N;
        $this->clave = $C;
        $this->mail = $M;
    }

    //crear un getter.

    public function getNombre(){

        return $this->nombre;
    }
    public function getMail(){

        return $this->mail;
    }
    public function getClave(){

        return $this->clave;
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
    }

    public static function DibujarListado($strArray){


        print("<ul>");
            foreach($strArray as $user){
                print("<li>". $user->getNombre()."</li>");
                print("<li>". $user->getMail()."</li>");
                print("<li>".$user->getClave()."</li>");
            }
            print("</ul>");
        }
    }

}
?>
