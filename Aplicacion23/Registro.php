

<?php 

include 'Usuario/Usuario.php';

    if(isset($_POST['_nombre']) && isset($_POST['_clave']) && isset($_POST['_mail']) && $_FILES["_archivo"] ["error"] == 0){

        $arcName= $_POST['_nombre'];
        $destino ="usuario/fotos/". $arcName .".jpg";
        $uploadOk = true;

        $tipoArchivo = pathinfo($_FILES["_archivo"]["name"], PATHINFO_EXTENSION);

	    $esImagen = getimagesize($_FILES["_archivo"]["tmp_name"]);

	    if($esImagen === FALSE) {
	    	$uploadOk = FALSE;
	    	echo "Solo son permitidas IMAGENES.";
    	}
    	else {

		    if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
			&& $tipoArchivo != "png") {
                $uploadOk = FALSE;
                echo "Solo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
		    }
	    }
        if ($uploadOk === FALSE) {

            echo "<br/><br/>NO SE PUDO SUBIR EL ARCHIVO.";

        } else {

            if ( move_uploaded_file($_FILES["_archivo"]["tmp_name"],$destino)) {

                $user =  new usuario($_POST['_nombre'],$_POST['_clave'],$_POST['_mail'],$destino);

                usuario::GuardarJson($user);
                     
            } 
            else {
                $mensaje = "Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
            }
        }
    }
?>
