<?php

class producto {

    public $codigo;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;


    public function __construct ($_nombre, $_tipo, $_stock, $_precio, $_codigo){

        $this->nombre = $_nombre;
        $this->tipo = $_tipo;
        $this->stock = $_stock;
        $this->precio = $_precio;
        $this->codigo = $_codigo;
    }

    public function GetCodigo(){ 
        return $this->codigo;
    }
    public function GetNombre(){
        return $this->nombre;
    }
    public function GetTipo(){
        return $this->tipo;
    }
    public function GetStock(){
        return $this->stock;
    }
    public function GetPrecio(){
        return $this->precio;
    }
    public function SetStock($valor){
        $this->stock = $valor;
    }

    public static function AltaDeProducto($producto){

        $retono;
        $json_string = json_encode($producto);
        $handler = fopen("Archivos/productos.json", "a");

        if(fwrite($handler,$json_string . "\n") > 0){
            $retono = true;
        }else{
            $retono = false;
        }
        fclose($handler);
        return $retono;
    }

    public function VerificarProducto($arrayProducto){

        $exite = false;
        foreach($arrayProducto as $prod){

            if($prod->GetCodigo() == $this->GetCodigo()){

                $cantidad = $this->GetStock();
                $viejoStock = $prod->GetStock();
                $nuevoStock = $cantidad + $viejoStock;
                $prod->SetStock((string)$nuevoStock);
                $exite = true;
                break;
            }
        }
        return $exite;
    }

    public static function LeerArchivosJson($ArchivoJson){


        $archivo = fopen($ArchivoJson, "r");
        $arrayProducto = array();

        if($archivo != false){

            while (!feof($archivo)){
                $linea = fgets($archivo);
                if(!empty($linea)){

                    $datos = json_decode($linea, true);
                    $codigo = $datos['codigo'];
                    $nombre = $datos['nombre'];
                    $tipo = $datos['tipo'];
                    $stock = $datos['stock'];
                    $precio =$datos['precio'];

                    $producto = new producto($nombre, $tipo, $stock, $precio, $codigo);
                    array_push($arrayProducto,$producto);
                }
            }
            fclose($archivo);
            return $arrayProducto;
        }else{
            return null;
        }
    } 


    
    public static function VerificarProd($arrayProd, $codigo){
        
    }
    public static function VerificarStock(){
        
    }
}


?>