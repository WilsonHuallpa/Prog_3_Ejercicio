
/*
wilson huallpa
Aplicación Nº 27 (Registro BD) 
Archivo: registro.php
método:POST
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST , 
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos  la base de datos 
retorna si se pudo agregar o no.
*/
<?php 

include 'clases/Usuario.php';

    if(isset($_POST['_nombre']) && isset($_POST['_apellido']) && isset($_POST['_clave']) && isset($_POST['_mail']) && isset($_POST['_localidad'])){


        $nombre = $_POST['_nombre'];
        $apellido = $_POST['_apellido'];
        $clave = $_POST['_clave'];
        $mail = $_POST['_mail'];
        $localidad = $_POST['_localidad'];

        $user =  new usuario($nombre,$apellido,$clave,$mail,$localidad);

        echo $user->InsertarElUsuarioParametros();
                     
    
    }
?>
