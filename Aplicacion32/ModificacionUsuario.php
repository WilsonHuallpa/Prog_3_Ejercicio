
/*
wilson huallpa

Aplicación No 32(Modificacion BD)
Archivo: ModificacionUsuario.php
método:POST
Recibe los datos del usuario(nombre, clavenueva, clavevieja,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer la modificación,
guardando los datos la base de datos
retorna si se pudo agregar o no.
Solo pueden cambiar la clave

 */

<h1>Aplicacion 32</h1>

 <?php

    include 'Clases/AccesoDatos.php';
    include 'Clases/Usuario.php';

    if(isset($_POST['nombre']) && isset($_POST['claveNueva']) && isset($_POST['claveVieja']) && isset($_POST['mail'])){

        $nombre = $_POST['nombre'];
        $claveNueva = $_POST['claveNueva'];
        $claveVieja =$_POST['claveVieja'];
        $mail =  $_POST['mail'];

        $usuario = usuario::TraerUnUsuario($claveVieja);

        if($usuario != false){
            $usuario->_clave = $claveNueva;
            $modificacion = $usuario->ModificarUsuarioParametros();
            print "Se Agrego cambio: $modificacion Usuario: $nombre";
        }else{
            echo "ERROR....No se encuentro usuario.";
        }
    }

 ?>