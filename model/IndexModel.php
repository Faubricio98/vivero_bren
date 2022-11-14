<?php
class IndexModel
{
  function __construct()
  {
    require 'libs/SPDO.php';
    $this->db=SPDO::singleton();
  }
  public function masVistos($limit)
  {
    $consulta = $this->db->prepare("call get_mas_vistos(".$limit.");");
    $consulta->execute();
    $data=$consulta->fetchAll();
    $consulta->closeCursor();
    return $data;
  }
  public function getOfertas($limit)
  {
    $consulta = $this->db->prepare("call get_productos_ofertas(".$limit.");");
    $consulta->execute();
    $data=$consulta->fetchAll();
    $consulta->closeCursor();
    return $data;
  }
  public function getAllCategorias(){
    $consulta = $this->db->prepare("CALL sp_get_categorias;");
    $consulta->execute();
    $data=$consulta->fetchAll();
    $consulta->closeCursor();
    return $data;
  }
}
?>
