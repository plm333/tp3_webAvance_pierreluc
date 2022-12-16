<?php
session_start();
require_once __DIR__.'/library/RequirePage.php';
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/library/Twig.php';
require_once __DIR__.'/library/Validation.php';
require_once __DIR__.'/library/CheckSession.php';


//print_r($_SERVER['PATH_INFO']);
//$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/'; // Seulement si tu travailles localement avec le .htaccess (localement)
$url = isset($_GET["url"]) ? explode ('/', ltrim($_GET["url"], '/')) : '/';          //***** À changer pour le webdev *****

//print_r($url);

if($url == '/'){
    require_once 'controller/ControllerHome.php';
    $controller = new ControllerHome;
    echo $controller->index();
}else{
    $requestURL = $url[0];
    $requestURL = ucfirst($requestURL);
    $controllerPath = __DIR__.'/controller/Controller'.$requestURL.'.php';

    if(file_exists($controllerPath)){
        require_once($controllerPath);
        $controllerName = 'Controller'.$requestURL;
        $controller = new $controllerName;
        if(isset($url[1])){
                $method = $url[1];
                if(isset($url[2])){
                    $value = $url[2];
                    echo $controller->$method($value);
                    // if(isset($url[3])){
                    //     $value2 = $url[3];
                    //     echo $controller->$method($value2);
                    // }else{
                    //     echo $controller->$method();
                    // }
                }else{
                    echo $controller->$method();
                }
        }else{
            echo $controller->index();
        }
        
    }else{
        require_once 'controller/ControllerHome.php';
        $controller = new ControllerHome;
        echo $controller->error();
    }
}


?>