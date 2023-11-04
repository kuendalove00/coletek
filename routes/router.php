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

        $controllerInstance->$action((object) $_REQUEST);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

$routes = [
    'GET' => [
        '/coletek/' => fn() => loadRoute('PageController', "index"),
        '/coletek/usuarios' => fn() => loadRoute('UserController', "index"),
        '/coletek/usuarios/index' => fn() => loadRoute('UserController', "index"),
        '/coletek/usuarios/criar' => fn() => loadRoute('UserController', "create"),
        '/coletek/usuarios/editar' => fn() => loadRoute('UserController', "edit"),
        '/coletek/usuarios/ver' => fn() => loadRoute('UserController', "show"),
        '/coletek/usuarios/pesquisar' => fn() => loadRoute('UserController', "search"),
        '/coletek/setores/' => fn() => loadRoute('SectorController', "index"),
        '/coletek/setores/index' => fn() => loadRoute('SectorController', "index"),
        '/coletek/setores/criar' => fn() => loadRoute('SectorController', "create"),
        '/coletek/setores/editar' => fn() => loadRoute('SectorController', "edit"),
    ],
    'POST' => [
        '/coletek/usuarios/' => fn() => loadRoute('UserController', "store"),
        '/coletek/usuarios/remover' => fn() => loadRoute('UserController', "delete"),
        '/coletek/usuarios/atualizar' => fn() => loadRoute('UserController', "update"),
        '/coletek/usuarios/vincular' => fn() => loadRoute('UserController', "linkSectors"),
        '/coletek/usuarios/desvincular' => fn() => loadRoute('UserController', "unlinkSectors"),
        '/coletek/setores/' => fn() => loadRoute('SectorController', "store"),
        '/coletek/setores/remover' => fn() => loadRoute('SectorController', "delete"),
        '/coletek/setores/atualizar' => fn() => loadRoute('SectorController', "update"),
    ],
];
