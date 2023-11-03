<?php

namespace app\Repositories;
use database\DbConnection;
use PDOException;
use app\Model\Sector;

/**
 *
 * @author kuenda
 */
class SectorRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getDbInstance();
        var_dump($this->db);
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

    public function selectById($data) {
        $stmt = $this->db->prepare("SELECT * FROM sectors WHERE id=:id");
        $stmt->bindparam(":id", $data->id);
        $stmt->execute();
        $sector = $stmt->fetch();

        return new Sector($sector['id'], $sector['name']);
    }
    
    public function insert($data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO sectors VALUES(NULL, :name)");
            $stmt->bindparam(":name", $data->name);
            $stmt->execute();
            //return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function update($data) {
        try {
            $stmt = $this->db->prepare("UPDATE sectors SET name=:name WHERE id=:id");
            $stmt->bindparam(":id", $data->id);
            $stmt->bindparam(":name", $data->name);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($data) {
        try {
            $stmt = $this->db->prepare("DELETE FROM sectors WHERE id=:id");
            $stmt->bindparam(":id", $data->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
