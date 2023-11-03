<?php

function loadRoute(string $controller, string $action) {
    try {
        $controllerNamespace = "app\\controller\\{$controller}";

        var_dump($controllerNamespace);
        
        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }

        $controllerInstance = new $controllerNamespace();
        
         

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("O método {$action} não existe no controller {$controller}");
        }
        

        $controllerInstance->$action((object) $_REQUEST);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

$routes = [
    'GET' => [
        '/testeColtek/' => fn() => loadRoute('PageController', "index"),
        '/testeColtek/usuarios' => fn() => loadRoute('UserController', "index"),
        '/testeColtek/usuarios/index' => fn() => loadRoute('UserController', "index"),
        '/testeColtek/usuarios/criar' => fn() => loadRoute('UserController', "create"),
        '/testeColtek/usuarios/editar' => fn() => loadRoute('UserController', "edit"),
        '/testeColtek/usuarios/ver' => fn() => loadRoute('UserController', "show"),
        '/testeColtek/setores/' => fn() => loadRoute('SectorController', "index"),
        '/testeColtek/setores/index' => fn() => loadRoute('SectorController', "index"),
        '/testeColtek/setores/criar' => fn() => loadRoute('SectorController', "create"),
        '/testeColtek/setores/editar' => fn() => loadRoute('SectorController', "edit"),
    ],
    'POST' => [
        '/testeColtek/usuarios/' => fn() => loadRoute('UserController', "store"),
        '/testeColtek/usuarios/remover' => fn() => loadRoute('UserController', "delete"),
        '/testeColtek/usuarios/atualizar' => fn() => loadRoute('UserController', "update"),
        '/testeColtek/usuarios/vincular' => fn() => loadRoute('UserController', "link"),
        '/testeColtek/usuarios/desvincular' => fn() => loadRoute('UserController', "unlink"),
        '/testeColtek/setores/' => fn() => loadRoute('SectorController', "store"),
        '/testeColtek/setores/remover' => fn() => loadRoute('SectorController', "delete"),
        '/testeColtek/setores/atualizar' => fn() => loadRoute('SectorController', "update"),
    ],
];
