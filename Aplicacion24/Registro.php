

<?php 

include 'Usuario/Usuario.php';

class Registrador{


   // private int $_id=0;

    private usuario $_usuario;
    private $_fechaRegistro;

    public function __construct(usuario $usuario, $_fechaRegistro){

        //$this->_id = Registrador::RetornarUltimoid();
        $this->_usuario = $usuario;
        $this->_fechaRegistro = $_fechaRegistro;
    }

    /*public function RetornarUltimoid(){

        //averiguarr
        $archivos = fopen("ultimoid.txt", "r");

        $texto = fread($archivo, sizeof($archivo));
        $texto = $texto + 1;
        fclose($archivo);

        fopen($archivo, "w");

        //la primara ves tenes 
    }*/

    public function GetCantidadUser(){

        if(isset($this)){
            return Registrador::$id;
        }
    }

    public function GetUsuario(){
        if(isset($this)){
            return $this->_usuario;
        }
    }

    public function GetFechaRegistro(){
        if(isset($this)){
            return $this->_fechaRegistro;
        }
    }
}

    if(isset($_POST['_nombre']) && isset($_POST['_clave']) && isset($_POST['_mail']) && $_FILES["_archivo"] ["error"] == 0){

        $destino = "usuario/fotos/" . $_FILES["_archivo"]["name"];

        $uploadOk = true;


        $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);

        //OBTIENE EL TAMA�O DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
	    //IMAGEN, RETORNA FALSE
	    $esImagen = getimagesize($_FILES["_archivo"]["tmp_name"]);

	    if($esImagen === FALSE) {//NO ES UNA IMAGEN
	    	$uploadOk = FALSE;
	    	echo "Solo son permitidas IMAGENES.";
    	}
    	else {// ES UNA IMAGEN

		    //SOLO PERMITO CIERTAS EXTENSIONES
		    if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
			&& $tipoArchivo != "png") {
                $uploadOk = FALSE;
                echo "Solo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
		    }
	    }
        //VERIFICO SI HUBO ALGUN ERROR, CHEQUEANDO $uploadOk
        if ($uploadOk === FALSE) {

            echo "<br/><br/>NO SE PUDO SUBIR EL ARCHIVO.";

        } else {
            //MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
            if ( move_uploaded_file($_FILES["_archivo"]["tmp_name"],$destino)) {

                
                rename($destino, "usuario/fotos/wilson.jpg");

                //$usuario = array();

                $user =  new usuario($_POST['_nombre'],$_POST['_clave'],$_POST['_mail'],$destino);

                // $usuarios = usuario::LeerJson("Archivos/usuarios.json");

               // $json_string = json_encode($userArray);

                //array_push($usuarios, $user);

                usuario::GuardarJson($user);
                     
            } 
            else {
                $mensaje = "Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
            }
        }

        usuario::LeerJson("Archivos/usuarios.json");
        //agregar otro elemento al mi json. y cambiar el destino de mi ubicacion.
    }
?>
