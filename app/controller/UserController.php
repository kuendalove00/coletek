<?php

namespace app\Controller;

use app\Services\UserServices;
use app\Services\SectorServices;
use app\Services\UserSectorsServices;
use stdClass;

class UserController{
    
    private $userServices = NULL;
    private $sectorServices = NULL;
    private $userSectorServices = NULL;

    
    public function __construct() {
        $this->userServices = new UserServices();
        $this->sectorServices = new SectorServices();
        $this->userSectorServices = new UserSectorsServices();
    }
    
    public function index() {
        $users = $this->userServices->getAllUsers();  
        return Controller::view("user/list",[$users]);
    }
    
    public function show($id) {
        $user = $this->userServices->getUser($id);
        $sectors = $this->sectorServices->getAllSectors();
        
        $userSectors = $this->userSectorServices->getUserSectors($id);
        return Controller::view("user/show",[$user, $sectors, $userSectors]);
    }
    
    public function link($params) {
       
        $sector = $this->userSectorServices->addUserSector($params); 
        $data = new stdClass();
        $data->id = $params->user_id;
        return $this->show($data);
    }
    public function unlink($params) {
        $sector = $this->userSectorServices->removeUserSector($params); 
        $data = new stdClass();
        $data->id = $params->user_id;
        return $this->show(["id" => $params->user_id]);
    }
    
    public function create() {
        return Controller::view("user/create");
    }
    
    public function store($params) {
        $user = $this->userServices->addUser($params);
        return $this->create();
    }
    
    public function edit($id) {
        var_dump($id);
        $user = $this->userServices->getUser($id);
        var_dump($user);
        return Controller::view("user/edit",[$user]);
    }
    
    public function update($params) {
        $user = $this->userServices->updateUser($params);
        return $this->edit($params);
    }
    
    public function delete($id) {
        $user = $this->userServices->removeUser($id);
        return $this->index();
    }
}