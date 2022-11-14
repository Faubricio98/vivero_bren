<?php
class ProductosController{
    public function __construct() {
        $this->view = new View();
    }

    public function mostrar(){
        require 'model/ProductosModel.php';
        $inicio = new ProductosModel();
        $data['categorias'] = $inicio->getAllCategorias();
        $id = $_POST['id'];
        $data['prods']=$inicio->getProducto($id);
        $this->view->show("ProductoView.php", $data);
    }

    public function mostrarListar(){
        require 'model/ProductosModel.php';
        $inicio = new ProductosModel();
        $data['categorias'] = $inicio->getAllCategorias(); //agregar siempre esta línea
        $data['prods']=$inicio->getAllProductos();
        $min = 18;
        $data['actualPage'] = $_GET['page'];
        if(count($data['prods']) <= $min){
            $data['pages'] = 1;
        }else{
            $data['pages'] = count($data['prods']) / $min;
            if(fmod($data['pages'], 1) > 0){
                $data['pages'] = $data['pages'] + (1 - fmod($data['pages'], 1));
            }
            if($data['actualPage'] > $data['pages']){
                $data['actualPage'] = $data['pages'];
            }
            $data['prods'] = array_slice($data['prods'], ($data['actualPage']-1)*$min, $min);
        }
        $data['previousPage'] = $_GET['page'] - 1;
        $data['nextPage'] = $_GET['page'] + 1;
        $this->view->show("listarProductosView.php", $data);
    }

    public function mostrarListarFiltro(){
        require 'model/ProductosModel.php';
        $inicio = new ProductosModel();
        $data['categorias'] = $inicio->getAllCategorias(); //agregar siempre esta línea
        $data['prods']=$inicio->getProductosFiltro($_POST['nombreArt']);
        $min = 9;
        $data['actualPage'] = $_GET['page'];
        if(count($data['prods']) <= $min){
            $data['pages'] = 1;
        }else{
            $data['pages'] = count($data['prods']) / $min;
            if(fmod($data['pages'], 1) > 0){
                $data['pages'] = $data['pages'] + (1 - fmod($data['pages'], 1));
            }
            if($data['actualPage'] > $data['pages']){
                $data['actualPage'] = $data['pages'];
            }
            $data['prods'] = array_slice($data['prods'], ($data['actualPage']-1)*$min, $min);
        }
        $data['previousPage'] = $_GET['page'] - 1;
        $data['nextPage'] = $_GET['page'] + 1;
        $this->view->show("listarProductosView.php", $data);
    }
}
?>
