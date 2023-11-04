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
        $sectors = $this->sectorServices->getNotLinkedSectors($id);
        $userSectors = $this->userSectorServices->getUserSectors($id);
        return Controller::view("user/show",[$user, $sectors, $userSectors]);
    }
    
    public function linkSectors($params) {       
        $this->userSectorServices->addUserSector($params);
        return $this->show($this->getUserData($params->user_id));
    }
    public function unlinkSectors($params) {
        $this->userSectorServices->removeUserSector($params); 
        return $this->show($this->getUserData($params->user_id));
    }
    
    public function search($params)
    {
        $users = $this->userServices->searchUsersBySector($params);  
        return Controller::view("user/list",[$users]);
    }

    private function getUserData($user_id)
    {
        $data = new stdClass();
        $data->id = $user_id;
        return $data;
    }
    
    public function create() {
        return Controller::view("user/create");
    }
    
    public function store($params) {
        $this->userServices->addUser($params);
        return $this->create();
    }
    
    public function edit($id) {
        $user = $this->userServices->getUser($id);
        return Controller::view("user/edit",[$user]);
    }
    
    public function update($params) {
        $this->userServices->updateUser($params);
        return $this->edit($params);
    }
    
    public function delete($id) {
        $this->userServices->removeUser($id);
        return $this->index();
    }
}