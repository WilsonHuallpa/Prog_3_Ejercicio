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

include 'clases/Usuario.php';

    if(isset($_POST['clave']) && isset($_POST['mail'])){
/*
        
        $clave = $_POST['clave'];
        $mail = $_POST['mail'];

        $usuarioAregistrar = new Usuario($mail,$clave);
*/

        
       // $usuarioss = Usuario::TraerTodoLosUsuario();
/*
        if( la clave no es un entero o no son iguales a 4 digitos){
            echo "clave incorrecta";
        }else{
            if(mail es igual a los mail de los usuarios){

                if(cerificac la clave si es, quiero cojer ala prii){
                    echo "exito":
                }else{
                    echo "no se encuetra registrado.";
                }

            }else{
                echo "erro en el mail.";
            }
        }


        
        foreach($usuarioss as $user){
            echo $user->mail ,"\n";

        }
        */
    }

    $numero = Usuario::TraerElMaildeUsuario($mail);

    echo $numero;










?>
