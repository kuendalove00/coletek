<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\Repositories;
use database\DbConnection;
use PDOException;
use app\Model\UserSectors;

/**
 * Description of UserSectorsRepository
 *
 * @author ndonge
 */
class UserSectorsRepository {
    
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getDbInstance();
    }
    
    public function selectById($data) {
        $sectors = Array();
        var_dump("Olha a data",$data);
        $stmt = $this->db->prepare("SELECT * FROM user_sectors WHERE user_id=:id");
        $stmt->bindparam(":id", $data->id);
        $stmt->execute();
        $result = $stmt->fetchAll();
       
        if(!$result){
            return;
        }
           
        foreach ($result as $sector) {
            $sectors[] = new UserSectors($sector['user_id'], $sector['sector_id']);
        }
        
        return $sectors;
    }
    
    public function insert($data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO user_sectors VALUES(:sector_id, :user_id)");
            var_dump($data);
            $stmt->bindparam(":user_id", $data->user_id);
            $stmt->bindparam(":sector_id", $data->sector_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function delete($data) {
        try {
            $stmt = $this->db->prepare("DELETE FROM user_sectors WHERE sector_id=:id");
            $stmt->bindparam(":id", $data->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
