<?php

namespace app\Services;
use app\Repositories\SectorRepository;
use app\Services\Interfaces\ISectorServices;

class SectorServices implements ISectorServices{
    private $sectorRepo = NULL;

    public function __construct() {
        $this->sectorRepo = new SectorRepository();
    }
    
    public function getAllSectors() {
        return $this->sectorRepo->selectAll();
    }
    
    public function getNotLinkedSectors($data) {
        return $this->sectorRepo->selectNotLinked($data);
    }
    
    public function getSector($id) {
        return $this->sectorRepo->selectById($id);
    }
    
    public function addSector($data) {
        $res = $this->sectorRepo->insert($data);
        if($res){
            echo '<script>alert("Setor cadastrado com sucesso");</script>';
        }
        return;
    }
    
    public function updateSector($data) {
        $res = $this->sectorRepo->update($data);
        if($res){
            echo '<script>alert("Setor atualizado com sucesso");</script>';
        }
        return;
    }
    
    public function removeSector($id) {
        $res = $this->sectorRepo->delete($id);
        if($res){
            echo '<script>alert("Setor excluído com sucesso");</script>';
        }
        return;
    }
}
