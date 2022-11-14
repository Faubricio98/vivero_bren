<?php

    class OfertasController{
        public function __construct() {
            $this->view = new View();
        }

        public function mostrar(){
            require 'model/OfertasModel.php';
            $ofertas = new OfertasModel();
            $data['categorias'] = $ofertas->getAllCategorias();
            $data['ofertas'] = $ofertas->getAllOfertas();
            $min = 10;
            $data['actualPage'] = $_GET['page'];
            if(count($data['ofertas']) <= $min){
                $data['pages'] = 1;
            }else{
                $data['pages'] = count($data['ofertas']) / $min;
                if(fmod($data['pages'], 1) > 0){
                    $data['pages'] = $data['pages'] + (1 - fmod($data['pages'], 1));
                }
                if($data['actualPage'] > $data['pages']){
                    $data['actualPage'] = $data['pages'];
                }
                $data['ofertas'] = array_slice($data['ofertas'], ($data['actualPage']-1)*$min, $min);
            }
            $data['previousPage'] = $_GET['page'] - 1;
            $data['nextPage'] = $_GET['page'] + 1;
            $this->view->show("listarOfertasView.php", $data);
        }

        public function mostrarFiltro(){
            require 'model/OfertasModel.php';
            $ofertas = new OfertasModel();

            $rango = $_POST['rangofechas'];
            $fechaI = substr($rango,0,10);
            $fechaF = substr($rango, -10);


            $data['categorias'] = $ofertas->getAllCategorias();
            $data['ofertas'] = $ofertas->getOfertasFiltro($fechaI,$fechaF);
            $min = 10;
            $data['actualPage'] = $_GET['page'];
            if(count($data['ofertas']) <= $min){
                $data['pages'] = 1;
            }else{
                $data['pages'] = count($data['ofertas']) / $min;
                if(fmod($data['pages'], 1) > 0){
                    $data['pages'] = $data['pages'] + (1 - fmod($data['pages'], 1));
                }
                if($data['actualPage'] > $data['pages']){
                    $data['actualPage'] = $data['pages'];
                }
                $data['ofertas'] = array_slice($data['ofertas'], ($data['actualPage']-1)*$min, $min);
            }
            $data['previousPage'] = $_GET['page'] - 1;
            $data['nextPage'] = $_GET['page'] + 1;
            $this->view->show("listarOfertasView.php", $data);
        }
    }

?>
