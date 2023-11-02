<?php

namespace app\Repositories;
use DbConnection;
use PDOException;
use Model\Sector;

/**
 * Descr SectorRepository
 *
 * @author kuenda
 */
class SectorRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $sectors = Array();
        $stmt = $this->db->prepare("SELECT * FROM sectors");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $sector) {
            $sectors[] = new Sector($sector['id'], $sector['name']);
        }
        return $sectors;
    }

    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM sectors WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $sector = $stmt->fetch();

        return new Sector($sector['id'], $sector['name']);
    }
    
    public function insert($data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO sectors VALUES(:name)");
            $stmt->bindparam(":nome", $data["name"]);
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
            $stmt = $this->db->prepare("UPDATE sectors SET name=:name WHERE id=:id");
            $stmt->bindparam(":id", $data["id"]);
            $stmt->bindparam(":nome", $data["name"]);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM sectors WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
