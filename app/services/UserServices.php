<?php

namespace app\Services;
use app\Repositories\UserRepository;

/**
 * Description of UserServices
 *
 * @author kuenda
 */
class UserServices {
   
    private $userRepo = NULL;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }
    
    public function getAllUsers() {
        return $this->userRepo->selectAll();
    }
    
    public function getUser($id) {
        return $this->userRepo->selectById($id);
    }
    
    public function addUser($data) {
        return $this->userRepo->insert($data);
    }
    
    public function updateUser($data) {
        return $this->userRepo->update($data);
    }
    
    public function removeUser($id) {
        return $this->userRepo->delete($id);
    }
    
}
