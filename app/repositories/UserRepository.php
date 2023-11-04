<?php

namespace app\Repositories;
use database\DbConnection;
use PDOException;
use app\Model\User;
use app\Repositories\Interfaces\IUserRepository;

class UserRepository implements IUserRepository {
    private $db;
    function __construct() {
        $this->db = DbConnection::getDbInstance();
    }

    public function selectAll() {
        $users = Array();
        $stmt = $this->db->prepare("CALL SelectAll('users');");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $user) {
            $users[] = new User($user['id'], $user['name'], $user['email']);
        }
        return $users;
    }

    public function selectById($data) {
        $stmt = $this->db->prepare("CALL SelectById('users',:id);");
        $stmt->bindparam(":id", $data->id);
        $stmt->execute();
        $user = $stmt->fetch();
        return new User($user['id'], $user['name'], $user['email']);
    }
    
    public function searchBySector($data) {
        $sector = "%{$data->sector}%";
        $stmt = $this->db->prepare("CALL SearchUsersBySector(:name);");
        $stmt->bindparam(":name", $sector);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $user) {
            $users[] = new User($user['id'], $user['name'], $user['email']);
        }
        if(empty($users))
        {
            return;
        }
        return $users;
    }


    public function insert($data) {
        try {
            $stmt = $this->db->prepare("CALL NewUser(:name,:email)");
            $stmt->bindparam(":name", $data->name);
            $stmt->bindparam(":email", $data->email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            if (str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Usuário com email já existente na base de dados");</script>';
            } else {
               echo $e->getMessage();
            }
           
            return false;
        }
    }
    
    public function update($data) {
        try {
            $stmt = $this->db->prepare("CALL UpdateUserInfo(:id,:name,:email);");
            $stmt->bindparam(":id", $data->id);
            $stmt->bindparam(":name", $data->name);
            $stmt->bindparam(":email", $data->email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            if (str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Usuário com email já existente na base de dados");</script>';
            } else {
               echo $e->getMessage();
            }
           
            return false;
        }
    }

    public function delete($data) {
        try {
            $stmt = $this->db->prepare("CALL DeleteById('users',:id);");
            $stmt->bindparam(":id", $data->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}
