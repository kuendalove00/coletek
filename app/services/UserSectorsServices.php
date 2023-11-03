<?php

namespace app\Services;
use app\Repositories\UserSectorsRepository;

/**
 *
 * @author ndonge
 */
class UserSectorsServices {
    private $userSectorRepo = NULL;

    public function __construct() {
        $this->userSectorRepo = new UserSectorsRepository();
    }
    
    public function getUserSectors($data) {
        return $this->userSectorRepo->selectById($data);
    }
    
    public function addUserSector($data) {
        return $this->userSectorRepo->insert($data);
    }
    
    public function removeUserSector($data) {
        return $this->userSectorRepo->delete($data);
    }
}
