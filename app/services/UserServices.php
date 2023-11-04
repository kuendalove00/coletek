<?php

namespace app\Services;

use app\Repositories\UserRepository;
use app\Services\Interfaces\IUserServices;

class UserServices implements IUserServices{
   
    private $userRepo = NULL;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }
    
    public function getAllUsers() {
        return $this->userRepo->selectAll();
    }
    
    public function searchUsersBySector($data) {
        return $this->userRepo->searchBySector($data);
    }
    
    public function getUser($id) {
        return $this->userRepo->selectById($id);
    }
    
    public function addUser($data) {
        $res = $this->userRepo->insert($data);
        if($res){
            echo '<script>alert("Usuário cadastrado com sucesso");</script>';
        }
        return;
    }
    
    public function updateUser($data) {
        $res = $this->userRepo->update($data);
        if($res){
            echo '<script>alert("Usuário atualizado com sucesso");</script>';
        }
        return;
    }
    
    public function removeUser($id) {
        $res = $this->userRepo->delete($id);
        if($res){
            echo '<script>alert("Usuário excluído com sucesso");</script>';
        }
        return;
    }   
}
