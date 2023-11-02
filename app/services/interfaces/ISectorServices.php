<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace app\Services\Interfaces;

/**
 *
 * @author ndonge
 */
interface ISectorServices {
    
   public function getAllSectors();
    
    public function getSector($id);
    
    public function addSector($data);
    
    public function updateSector($data);
    
    public function removeSector($id);
}
