<?php

namespace app\Repositories;
use database\DbConnection;
use PDOException;
use app\Model\UserSectors;
use app\Repositories\Interfaces\IUserSectorsRepository;


class UserSectorsRepository implements IUserSectorsRepository{
    
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getDbInstance();
    }
    
    public function selectById($data) {
        $sectors = Array();
        $stmt = $this->db->prepare("CALL SelectSectorsByUser(:id);");
        $stmt->bindparam(":id", $data->id);
        $stmt->execute();
        $result = $stmt->fetchAll();
       
        if(!$result){
            return;
        }
           
        foreach ($result as $sector) {
            $sectors[] = new UserSectors($sector['user_id'], $sector['sector_id'], $sector['name']);
        }
        
        return $sectors;
    }
    
    public function insert($user_id,$sector_id) {
        
        try {
            $stmt = $this->db->prepare("CALL LinkSectorsToUser(:sector_id,:user_id);");
            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":sector_id", $sector_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            if (str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Usuário já está vinculado ao setor");</script>';
            } else {
               echo $e->getMessage();
            }
           
            return false;
        }
    }
    
    public function delete($user_id,$sector_id) {
        try {
            $stmt = $this->db->prepare("CALL UnlinkSectorsToUser (:sector_id,:user_id);");
            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":sector_id", $sector_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
