
/*
wilson huallpa

Aplicación Nº 28 ( Listado BD)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,ventas)
cada objeto o clase tendrán los métodos para responder a la petición
devolviendo un listado <ul> o tabla de html <table>

*/
<h1>Aplicacion 28<h1>
<?php


include 'clases/Usuario.php';

if(isset($_GET['_listados'])){

    $correcto = "";
    $listado = $_GET['_listados'];

    switch($listado){
        case "usuarios":

            $arrayuser = usuario::TraerTodoLosUsuario();
            echo usuario::DibujarListado($arrayuser);
            break;
        case "productos":
            break;
        default:
            $correcto="no";
            break;
    }

    if($correcto == "no"){
        echo "no hay listado";
    }
}


?>