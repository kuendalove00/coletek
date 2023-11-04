<?php

namespace app\Controller;
use app\Controller\Controller;

class PageController {
    public function index() {
        Controller::view("index");
    }
    
}
