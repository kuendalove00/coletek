<?php

namespace app\Controller;

use app\Services\UserServices;

class UserController{
    
    private $userServices = NULL;


    public function __construct() {
        $this->userServices = new UserServices();
    }
    
    public function index() {
        $users = $this->userServices->getAllUsers();
        return $users;
    }
    
    public function show($id) {
        $user = $this->userServices->getUser($id);
        return $user;
    }
    
    public function create() {
        return;
    }
    
    public function store($params) {
        $user = $this->userServices->addUser($params);
        return $user;
    }
    
    public function edit($params) {
        return;
    }
    
    public function update($params) {
        $user = $this->userServices->updateUser($params);
        return $user;
    }
    
    public function delete($id) {
        $user = $this->userServices->removeUser($id);
        return $user;
    }
}