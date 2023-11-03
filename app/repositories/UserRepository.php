<?php


namespace app\Repositories;
use database\DbConnection;
use PDOException;
use app\Model\User;
/**
 * Descrição do UserRepository
 *
 * @author kuenda
 */
class UserRepository {
    
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getDbInstance();
    }

    public function selectAll() {
        $users = Array();
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $user) {
            $users[] = new User($user['id'], $user['name'], $user['email']);
        }
        return $users;
    }

    public function selectById($data) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id");
        var_dump($data);
        $stmt->bindparam(":id", $data->id);
        $stmt->execute();
        $user = $stmt->fetch();
        return new User($user['id'], $user['name'], $user['email']);
    }
    
    public function insert($data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users VALUES(NULL, :name, :email)");
            var_dump($data);
            $stmt->bindparam(":name", $data->name);
            $stmt->bindparam(":email", $data->email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function update($data) {
        try {
            $stmt = $this->db->prepare("UPDATE users SET name=:name, email=:email WHERE id=:id");
            $stmt->bindparam(":id", $data->id);
            $stmt->bindparam(":name", $data->name);
            $stmt->bindparam(":email", $data->email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($data) {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id=:id");
            $stmt->bindparam(":id", $data->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}
