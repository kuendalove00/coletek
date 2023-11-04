<?php


namespace app\Controller;

use Exception;

class Controller {
    
    public static function view(string $view, array $data = [])
    {
        $viewsPath = dirname(__FILE__,2)."/view";

        if(!file_exists($viewsPath.DIRECTORY_SEPARATOR.$view.".php"))
        {
            throw new Exception("A view {$view} não existe");
        }
        
        $array = $data;
        
        require_once __DIR__ . "/../view/$view.php";
    }
}
