<?php

namespace app\Repositories\Interfaces;

interface ISectorRepository {
    
    public function selectAll();

    public function selectNotLinked($data);

    public function selectById($data);

    public function insert($data);

    public function update($data);

    public function delete($data);
    
}
