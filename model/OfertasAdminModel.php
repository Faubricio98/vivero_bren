<?php
class OfertasAdminModel{
  function __construct(){
      require 'libs/SPDO.php';
      $this->db=SPDO::singleton();
  }

  public function getOfertas(){
    $consulta = $this->db->prepare("call get_ofertas();");
    $consulta->execute();
    $data=$consulta->fetchAll();
    $consulta->closeCursor();
    return $data;
  }

  public function getAllProductos(){
    $consulta = $this->db->prepare("call sp_get_articulos();");
    $consulta->execute();
    $data=$consulta->fetchAll();
    $consulta->closeCursor();
    return $data;
  }

  public function insert($fechai, $fechaf, $desc,$prod){
    $consulta = $this->db->prepare("call insertar_ofertar('".$fechai."','".$fechaf."',".$desc.",".$prod.");");
    $consulta->execute();
    $data=$consulta->fetchColumn();
    $consulta->closeCursor();
    return $data;
  }

  public function editar($fechai, $fechaf, $desc,$prod, $id){
    $consulta = $this->db->prepare("call editar_ofertar('".$fechai."','".$fechaf."',".$desc.",".$prod.",".$id.");");
    $consulta->execute();
    $data=$consulta->fetchColumn();
    $consulta->closeCursor();
    return $data;
  }

  public function eliminar($id){
    $consulta = $this->db->prepare("call eliminar_ofertar(".$id.");");
    $consulta->execute();
    $data=$consulta->fetchColumn();
    $consulta->closeCursor();
    return $data;
  }
}
 ?>
