
/*
wilson huallpa

*/
<h1>Aplicacion 21<h1>
<?php


include 'usuario.php';

if(isset($_GET['_listados'])){

    $listado = $_GET['_listados'];

    switch($listado){
        case "usuarios":
            $arrayuser = usuario::LeerArchivoscsv("usuarios.csv");
            echo usuario::DibujarListado($arrayuser);
            break;
        case "productos":
            $arrayuser = productos::LeerArchivos("productos.csv");
            echo productos::DibujarListado($arrayuser);
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