<?php


namespace app\Repositories\Interfaces;

/**
 *
 * @author kuenda
 */
interface ISectorRepository {
    
    public function selectAll();

    public function selectById($id);

    public function insert($name);
     
     public function update($id, $nome);

     public function delete($id);
    
}
