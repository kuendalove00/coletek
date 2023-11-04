<?php

namespace app\Services;
use app\Repositories\UserSectorsRepository;
use app\Services\Interfaces\IUserSectorsServices;

class UserSectorsServices implements IUserSectorsServices{
    private $userSectorRepo = NULL;

    public function __construct() {
        $this->userSectorRepo = new UserSectorsRepository();
    }
    
    public function getUserSectors($data) {
        return $this->userSectorRepo->selectById($data);
    }
    
    public function addUserSector($data) {
        
        if(empty($data->sectors))
        {
           return;
        }

        foreach ($data->sectors as $sector_id)
        {
            $this->userSectorRepo->insert($data->user_id, $sector_id);    
        }
        
        return;
    }
    
    public function removeUserSector($data) {
        
        if(empty($data->sector_id))
        {
           return;
        }
        
        foreach ($data->sector_id as $sector_id)
        {
            $this->userSectorRepo->delete($data->user_id, $sector_id);    
        }
        
        return true;
    }
}
