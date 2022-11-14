<?php

class FrontController{
    static function main(){
        require 'libs/View.php';
        require 'libs/configuration.php';
        require 'controller/ErrorController.php';
        $error = new ErrorController();
        
        if(!empty($_GET['controller'])){
            $controllerName=$_GET['controller'].'Controller';
        }else{
            $controllerName='IndexController';
        }
        
        if(!empty($_GET['option'])){
            $nombreAccion=$_GET['option'];
        }else{
            $nombreAccion='mostrar';
        }
        
        $rutaControlador=$config->get('controllerFolder').$controllerName.'.php';
        
        if(is_file($rutaControlador)){
            require $rutaControlador;
        }else{
            die($error->error(404, 'Not found', 'Ruta del controlador '.$rutaControlador.' no encontrada'));
        }
        
        if(is_callable(array($controllerName, $nombreAccion), false)){
            die($error->error(404, 'Not found', $controllerName.'->'.$nombreAccion.' no existe'));
            return FALSE;
        }
        session_start();
        $controller=new $controllerName();
        $controller->$nombreAccion();
    }
}

?>