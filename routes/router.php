<?php

function loadRoute(string $controller, string $action) {
    try {
        $controllerNamespace = "app\\controller\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("O método {$action} não existe no controller {$controller}");
        }
        
        var_dump($_REQUEST);

        //$controllerInstance->$action((object) $_REQUEST);
    } catch (Exception $ex) {
         echo $e->getMessage();
    }
}


$routes = [
    'GET' => [
        '/' => fn() => carregar('PageController', "index"),
        
        '/usuarios/' => fn() => carregar('UserController', "index"),
        '/usuarios/index' => fn() => carregar('UserController', "index"),
        '/usuarios/criar' => fn() => carregar('UserController', "create"),
        '/usuarios/editar' => fn() => carregar('UserController', "edit"),
        '/usuarios/ver' => fn() => carregar('UserController', "show"),
        
        '/setores/' => fn() => carregar('SectorController', "index"),
        '/setores/index' => fn() => carregar('SectorController', "index"),
        '/setores/criar' => fn() => carregar('SectorController', "create"),
        '/setores/editar' => fn() => carregar('SectorController', "edit"),
        '/setores/ver' => fn() => carregar('SectorController', "show"),
    ],
    'POST' => [    
        '/usuarios/' => fn() => carregar('UserController', "store"),
        '/usuarios/atualizar' => fn() => carregar('UserController', "update"),
        
        '/setores/' => fn() => carregar('SectorController', "store"),
        '/setores/atualizar' => fn() => carregar('SectorController', "update"),
    ],
];