<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\Controller;

use app\Services\SectorServices;

/**
 * Description of SectorController
 *
 * @author ndonge
 */
class SectorController {
     private $sectorServices = NULL;


    public function __construct() {
        $this->sectorServices = new SectorServices();
    }
    
    public function index() {
        $sectors = $this->sectorServices->getAllSectors();
        return $sectors;
    }
    
    public function show($id) {
        $sector = $this->sectorServices->getSector($id);
        return $sector;
    }
    
    public function create() {
        return;
    }
    
    public function store($params) {
        $sector = $this->sectorServices->addSector($params);
        return $sector;
    }
    
    public function edit($params) {
        return;
    }
    
    public function update($params) {
        $sector = $this->sectorServices->updateSector($params);
        return $sector;
    }
    
    public function delete($id) {
        $sector = $this->sectorServices->removeSector($id);
        return $sector;
    }
}
