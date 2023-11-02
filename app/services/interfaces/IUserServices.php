<?php

namespace app\Services\Interfaces;

/**
 *
 * @author kuenda
 */
interface IUserServices {
    public function getAllUsers();
    
    public function getUser($id);
    
    public function addUser($data);
    
    public function updateUser($data);
    
    public function removeUser($id);
}
