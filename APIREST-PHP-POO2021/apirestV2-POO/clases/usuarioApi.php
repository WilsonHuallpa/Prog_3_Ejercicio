<?php


// vamos a tener todas las funcionalidades, y hacemos la verificacion.
require_once 'usuario.php';
require_once 'IApiUsable.php';

class usuarioApi extends usuario implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
    	$elUsuario=usuario::TraerUnUsuario($id);
     	$newResponse = $response->withJson($elUsuario, 200);  
    	return $newResponse;
    }
     public function TraerTodos($request, $response, $args) {
      	$todosLosUsuarios=usuario::TraerTodoLosUsuario();
     	$newResponse = $response->withJson($todosLosUsuarios, 200);  
    	return $newResponse;
    }
      public function CargarUno($request, $response, $args) {
     	 $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $nombre= $ArrayDeParametros['nombre'];
        $mail= $ArrayDeParametros['mail'];
        $clave= $ArrayDeParametros['clave'];
        
        $miUser = new usuario();
        $miUser->nombre=$nombre;
        $miUser->mail=$mail;
        $miUser->clave=$clave;
        $miUser->InsertarElUserParametros();

		/*
        $archivos = $request->getUploadedFiles();
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);

		
        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
		*/
        $response->getBody()->write("se guardo el usuario");

        return $response;
    }
      public function BorrarUno($request, $response, $args) {
     	$id=$args['id'];
     	$unUser= new usuario();
     	$unUser->id=$id;
     	$cantidadDeBorrados=$unUser->BorrarUsuario();

     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="algo borro!!!";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;
    }
     
     public function ModificarUno($request, $response, $args) {
     	//$response->getBody()->write("<h1>Modificar  uno</h1>");
     	$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
	    $miUser = new usuario();
	    $miUser->id=$ArrayDeParametros['id'];
	    $miUser->nombre=$ArrayDeParametros['nombre'];
	    $miUser->mail=$ArrayDeParametros['mail'];
	    $miUser->clave=$ArrayDeParametros['clave'];

	   	$resultado =$miUser->ModificarUsuarioParametros();
	   	$objDelaRespuesta= new stdclass();
		//var_dump($resultado);
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
    }


}