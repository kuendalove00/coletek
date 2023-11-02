<?php


namespace app\Repositories;
use DbConnection;
use PDOException;
use Model\User;
/**
 * Descrição do UserRepository
 *
 * @author kuenda
 */
class UserRepository {
    
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
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

    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();

        return new User($user['id'], $user['nome'], $user['tipo']);
    }
    
    public function insert($data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users VALUES(:name, :email)");
            $stmt->bindparam(":nome", $data["name"]);
            $stmt->bindparam(":email", $data["email"]);
            $stmt->execute();
            $id = $this->db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function update($data) {
        try {
            $stmt = $this->db->prepare("UPDATE users SET name=:name, email=:email WHERE id=:id");
            $stmt->bindparam(":id", $$data["id"]);
            $stmt->bindparam(":nome", $data["name"]);
            $stmt->bindparam(":email", $data["email"]);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}
