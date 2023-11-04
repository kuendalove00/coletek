<?php

namespace app\Services\Interfaces;

interface IUserServices {
    
    public function getAllUsers();
    
    public function searchUsersBySector($data);
    
    public function getUser($id);
    
    public function addUser($data);
    
    public function updateUser($data);
    
    public function removeUser($id);
}
