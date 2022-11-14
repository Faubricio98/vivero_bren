<?php

    class OfertasModel{
        function __construct(){
            require 'libs/SPDO.php';
            $this->db=SPDO::singleton();
        }

        public function getAllOfertas(){
            $consulta = $this->db->prepare("call get_all_ofertas;");
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

        public function getOfertasFiltro($fechai, $fechaf){
            $consulta = $this->db->prepare("call get_all_ofertas_filtro('".$fechai."', '".$fechaf."');");
            $consulta->execute();
            $data=$consulta->fetchAll();
            $consulta->closeCursor();
            return $data;
        }
    }

?>
