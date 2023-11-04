<?php

namespace app\Repositories;

use app\Repositories\Interfaces\ISectorRepository;
use database\DbConnection;
use PDOException;
use app\Model\Sector;

class SectorRepository implements ISectorRepository {

    private $db;

    function __construct() {
        $this->db = DbConnection::getDbInstance();
    }

    public function selectAll() {
        $sectors = Array();
        $stmt = $this->db->prepare("CALL SelectAll('sectors');");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $sector) {
            $sectors[] = new Sector($sector['id'], $sector['name']);
        }
        return $sectors;
    }

    public function selectNotLinked($data) {
        $sectors = Array();
        $stmt = $this->db->prepare("CALL SelectNotLinked(:id);");
        $stmt->bindparam(":id", $data->id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $sector) {
            $sectors[] = new Sector($sector['id'], $sector['name']);
        }
        return $sectors;
    }

    public function selectById($data) {
        $stmt = $this->db->prepare("CALL SelectById('sectors',:id);");
        $stmt->bindparam(":id", $data->id);
        $stmt->execute();
        $sector = $stmt->fetch();

        return new Sector($sector['id'], $sector['name']);
    }

    public function insert($data) {
        try {
            $stmt = $this->db->prepare("CALL NewSector(:name)");
            $stmt->bindparam(":name", $data->name);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            if (str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Setor já existe na base de dados");</script>';
            } else {
               echo $e->getMessage();
            }
            
            return false;
        }
    }

    public function update($data) {
        try {
            $stmt = $this->db->prepare("CALL UpdateSectorInfo(:id,:name);");
            $stmt->bindparam(":id", $data->id);
            $stmt->bindparam(":name", $data->name);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            if (str_contains($e, '1062')) {
                echo '<script>alert("Dados Duplicados: Setor já existe na base de dados");</script>';
            } else {
               echo $e->getMessage();
            }
           
            return false;
        }
    }

    public function delete($data) {
        try {
            $stmt = $this->db->prepare("CALL DeleteById('sectors',:id)");
            $stmt->bindparam(":id", $data->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            if (str_contains($e, '1451')) {
                echo '<script>alert("Dependencia de Dados: Não é possível remover setor");</script>';
            } else {
               echo $e->getMessage();
            }
            
            return false;
        }
    }

}
