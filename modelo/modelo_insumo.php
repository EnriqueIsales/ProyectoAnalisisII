<?php 

class Modelo_Insumo{
    private $conexion;
    function __construct(){
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }
    
    function listar_insumo(){
        $sql = "call SP_LISTAR_INSUMO()";
        $arreglo = array();
        if($consulta = $this->conexion->conexion->query($sql)){
            while ($consulta_VU = mysqli_fetch_assoc($consulta)){
                $arreglo["data"][]=$consulta_VU;

            }
        }

        return $arreglo;
        $this->conexion->cerrar();
    }


   

 function Registrar_Insumo($insumo,$stock,$estatus){
    $sql = "call SP_REGISTRAR_INSUMO('$insumo','$stock','$estatus')";
    if($consulta = $this->conexion->conexion->query($sql)){
        if ($row = mysqli_fetch_array($consulta)){
            
               return $id=trim($row[0]);
            
        }
        $this->conexion->cerrar();
    }

 }





 function  Modificar_Insumo($id,$insumoactual,$insumonuevo,$stock,$estatus){
    $sql = "call SP_MODIFICAR_INSUMO('$id','$insumoactual','$insumonuevo','$stock','$estatus')";
    if($consulta = $this->conexion->conexion->query($sql)){
        if ($row = mysqli_fetch_array($consulta)){
            
               return $id=trim($row[0]);//retprma valores
            
        }
        $this->conexion->cerrar();
    }

 }









}