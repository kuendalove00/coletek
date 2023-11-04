<?php

namespace app\Services\Interfaces;

interface ISectorServices {
    
   public function getAllSectors();
   
    public function getNotLinkedSectors($data);
    
    public function getSector($id);
    
    public function addSector($data);
    
    public function updateSector($data);
    
    public function removeSector($id);
}
