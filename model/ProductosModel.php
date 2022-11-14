<?php
  class ProductosModel{
    function __construct(){
      require 'libs/SPDO.php';
      $this->db=SPDO::singleton();
    }
  
    public function getProducto($id){
      $consulta = $this->db->prepare("call get_producto_by_id (".$id.");");
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

    public function getAllCategorias(){
      $consulta = $this->db->prepare("CALL sp_get_categorias;");
      $consulta->execute();
      $data=$consulta->fetchAll();
      $consulta->closeCursor();
      return $data;
    }

    public function createNewArticulo($form, $arch, $desc, $prec, $cat, $nom){
      $consulta = $this->db->prepare("CALL sp_create_new_articulo('".$form."', '".$arch."', '".$desc."', ".$prec.", ".$cat.", '".$nom."');");
      $consulta->execute();
      $data=$consulta->fetchAll();
      $consulta->closeCursor();
      foreach ($data as $item) {
        return $item[1];
      }
    }

    public function editarArticulo($id, $form, $arch, $desc, $prec, $cat, $nom){
      $consulta = $this->db->prepare("CALL sp_update_articulo(".$id.", '".$form."', '".$arch."', '".$desc."', ".$prec.", ".$cat.", '".$nom."');");
      $consulta->execute();
      $data=$consulta->fetchAll();
      $consulta->closeCursor();
      foreach ($data as $item) {
        return $item[1];
      }
    }

    public function eliminarArticulo($id){
      $consulta = $this->db->prepare("CALL sp_delete_articulo(".$id.");");
      $consulta->execute();
      $data=$consulta->fetchAll();
      $consulta->closeCursor();
      foreach ($data as $item) {
        return $item[1];
      }
    }

    public function getProductosFiltro($nombre){
      $consulta = $this->db->prepare("CALL sp_get_productos_filtro('".$nombre."');");
      $consulta->execute();
      $data=$consulta->fetchAll();
      $consulta->closeCursor();
      return $data;
    }
  }
?>
