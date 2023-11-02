<?php


namespace app\Repositories\Interfaces;

/**
 * Description of IUserRepository
 *
 * @author kuenda
 */
interface IUserRepository {
    
    public function selectAll();

    public function selectById($id);

    public function insert($name, $email);
     
     public function update($id, $nome, $email);

     public function delete($id);
}
