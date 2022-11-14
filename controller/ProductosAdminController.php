<?php
class ProductosAdminController{
  public function __construct() {
    $this->view = new View();
  }

  public function mostrar(){
    require 'model/AdministradorModel.php';
    $model = new AdministradorModel();
    $prods['imagen'] = 2;
    $prods['prods'] = $model->getAllProductos();
    $prods['categorias'] = $model->getAllCategorias();
    $this->view->show("productosAdminView.php", $prods);
  }

  public function insertarProducto(){
    require 'model/ProductosModel.php';
    $model = new ProductosModel();
    $target_dir = "public/img/productos/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $prods['imagen'] = 0;
    $documentFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Allow certain file formats
    if($documentFileType != "png" && $documentFileType != "jpg" && $documentFileType != "jpeg" && $documentFileType != "webp") {
      $prods['imagen'] = -1;
    }
    // Check if $uploadOk is set to 0 by an error
    if($prods['imagen'] == 0){
      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        $prods['imagen'] = $model->createNewArticulo(".".pathinfo($target_file, PATHINFO_EXTENSION), pathinfo($target_file, PATHINFO_FILENAME), $_POST['desc'], $_POST['prec'], $_POST['cat'], $_POST['nom']);
      } else {
        $prods['imagen'] = -2;
      } 
    }
    $prods['prods'] = $model->getAllProductos();
    $prods['categorias'] = $model->getAllCategorias();
    $this->view->show("productosAdminView.php", $prods);
  }

  public function editarProducto(){
    require 'model/ProductosModel.php';
    $model = new ProductosModel();
    $form = "--";
    $arch = "--";
    echo $_FILES["imge"]['size'] . "_" . $_FILES["imge"]['error'];
    //edición de datos sin cambiar la imagen
    if ($_FILES["imge"]['size'] == 0){
      $form = "--";
      $arch = "--";
      $prods['imagen'] = $model->editarArticulo($_POST['idprod'], $form, $arch, $_POST['desce'], $_POST['prece'], $_POST['cate'], $_POST['nome']);
    }else{
      //edición de datos cambiando la imagen
      $target_dir = "public/img/productos/";
      $target_file = $target_dir . basename($_FILES["imge"]["name"]);
      $prods['imagen'] = 0;
      $documentFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      // Allow certain file formats
      if($documentFileType != "png" && $documentFileType != "jpg" && $documentFileType != "jpeg" && $documentFileType != "webp") {
        $prods['imagen'] = -1;
      }
      $form = ".".pathinfo($target_file, PATHINFO_EXTENSION);
      $arch = pathinfo($target_file, PATHINFO_FILENAME);
      // Check if $uploadOk is set to 0 by an error
      if($prods['imagen'] == 0){
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
          $prods['imagen'] = $model->editarArticulo($_POST['idprod'], $form, $arch, $_POST['desce'], $_POST['prece'], $_POST['cate'], $_POST['nome']);
        } else {
          $prods['imagen'] = -2;
        }
      }
    }
    $prods['prods'] = $model->getAllProductos();
    $prods['categorias'] = $model->getAllCategorias();
    $this->view->show("productosAdminView.php", $prods);
  }

  public function eliminarProducto(){
    require 'model/ProductosModel.php';
    $model = new ProductosModel();
    return $model->eliminarArticulo($_POST['id']);
  }
}
?>
