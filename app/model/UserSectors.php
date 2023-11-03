<?php

namespace app\Model;

/**
 *
 * @author ndonge
 */
class UserSectors {
    private int $user_id;
    private int $sector_id;
    
    public function getUserId(): int {
        return $this->user_id;
    }

    public function getSectorId(): int {
        return $this->sector_id;
    }

    public function setUserId(int $user_id): void {
        $this->user_id = $user_id;
    }

    public function setSectorId(int $sector_id): void {
        $this->sector_id = $sector_id;
    }

    public function __construct(int $user_id, int $sector_id) {
        $this->user_id = $user_id;
        $this->sector_id = $sector_id;
    }
    
}
