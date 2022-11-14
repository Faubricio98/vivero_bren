<?php
class OfertasAdminController{
  public function __construct() {
      $this->view = new View();
  }

  public function ofertasAdmin(){
    require 'model/OfertasAdminModel.php';
    $model = new OfertasAdminModel();
    $ofers['ofers'] = $model->getOfertas();
    $ofers['prods'] = $model->getAllProductos();
    $this->view->show("ofertasAdminView.php", $ofers);
  }

  public function insertarOferta(){
    $rango = $_POST['rangofechas'];
    $desc = $_POST['desce'];
    $prod = $_POST['prode'];

    $fechaI = substr($rango,0,10);
    $fechaF = substr($rango, -10);

    require 'model/OfertasAdminModel.php';
    $model = new OfertasAdminModel();

    $result = $model->insert($fechaI, $fechaF, $desc, $prod);
    echo $result;
  }

  public function editarOferta(){
    $rango = $_POST['rangofechas'];
    $desc = $_POST['desce'];
    $prod = $_POST['prode'];
    $id = $_POST['idofer'];

    $fechaI = substr($rango,0,10);
    $fechaF = substr($rango, -10);

    require 'model/OfertasAdminModel.php';
    $model = new OfertasAdminModel();

    $result = $model->editar($fechaI, $fechaF, $desc, $prod, $id);
    echo $result;
  }

  public function eliminarOferta(){
    $id = $_POST['id'];

    require 'model/OfertasAdminModel.php';
    $model = new OfertasAdminModel();

    $result = $model->eliminar($id);
    echo $result;
  }
}
 ?>
