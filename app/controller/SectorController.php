<?php

namespace app\Controller;

use app\Services\SectorServices;

class SectorController {
     private $sectorServices = NULL;

    public function __construct() {
        $this->sectorServices = new SectorServices();
    }
    
    public function index() {
        $sectors = $this->sectorServices->getAllSectors();
        return Controller::view("sector/list",[$sectors]);
    }
    
    public function create() {
        return Controller::view("sector/create");
    }
    
    public function store($params) {
        $this->sectorServices->addSector($params); 
        return $this->create();
    }
    
    public function edit($id) {
        var_dump($id);
        $user = $this->sectorServices->getSector($id);
        return Controller::view("sector/edit",[$user]);
    }
    
    public function update($params) {
        $this->sectorServices->updateSector($params);
        return $this->edit($params);
    }
    
    public function delete($id) {
        $this->sectorServices->removeSector($id);
        return $this->index();
    }
}
