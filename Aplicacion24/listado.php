
/*
wilson huallpa

*/
<h1>Aplicacion 24<h1>
<?php


include 'Usuario/Usuario.php';

if(isset($_GET['_listados'])){

    $correcto = "";
    $listado = $_GET['_listados'];

    switch($listado){
        case "usuarios":
            $arrayuser = usuario::LeerArchivosJson("Archivos/usuarios.json");
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