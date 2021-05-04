/*
Wilson Huallpa


Aplicación No 29( Login con bd)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado en la
base de datos,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario.
 */

 <?php 
include 'clases/AccesoDatos.php';
include 'clases/Usuario.php';

    if(isset($_POST['clave']) && isset($_POST['mail'])){

        $clave = $_POST['clave'];
        $mail = $_POST['mail'];

       $usuario = usuario::TraerUnUsuarioIdMail($mail,$clave);

       if($usuario != false){
        // var_dump($usuario);
        echo "Usuario Registrado";
       }else{
           echo "usuario no registrado";
       }
        
    }
?>
