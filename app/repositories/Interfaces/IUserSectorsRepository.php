<?php

namespace app\Repositories\Interfaces;

interface IUserSectorsRepository {
    
    public function selectById($data);
    
    public function insert($user_id,$sector_id);
    
    public function delete($user_id,$sector_id);
}