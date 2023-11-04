<?php

namespace app\Repositories\Interfaces;

interface IUserRepository {
    
    public function selectAll();

    public function selectById($data);
    
    public function searchBySector($data);

    public function insert($data);
    
    public function update($data);

    public function delete($data);
}
