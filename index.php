<?php

require "./vendor/autoload.php";
require "./routes/router.php";

try{
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
    $request = $_SERVER["REQUEST_METHOD"];

    if(!isset($routes[$request]))
    {
        throw new Exception("A rota não existe");
    }
    
    if(!array_key_exists($uri, $routes[$request]))
    {
       http_response_code(404);
       echo 'Página não existe';
       throw new Exception("A rota não existe");
    }

    $controller = $routes[$request][$uri];
    
    $controller();
}catch(Exception $ex)
{
    $ex->getMessage();
}