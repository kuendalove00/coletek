<?php

namespace app\Controller;
use app\Controller\Controller;
/**
 * Description of PageController
 *
 * @author ndonge
 */
class PageController {
    public function index() {
        Controller::view("index");
    }
    
}
