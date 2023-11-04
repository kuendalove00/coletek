<?php

namespace app\Services\Interfaces;

interface IUserSectorsServices {
    
     public function getUserSectors($data);
    
    public function addUserSector($data);
    
    public function removeUserSector($data);
}
