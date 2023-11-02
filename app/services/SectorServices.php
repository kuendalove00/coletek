<?php


namespace app\Services;
use app\Repositories\SectorRepository;

/**
 * Description of SectorService
 *
 * @author kuenda
 */
class SectorServices {
    private $sectorRepo = NULL;

    public function __construct() {
        $this->sectorRepo = new SectorRepository();
    }
    
    public function getAllSectors() {
        return $this->sectorRepo->selectAll();
    }
    
    public function getSector($id) {
        return $this->sectorRepo->selectById($id);
    }
    
    public function addSector($data) {
        return $this->sectorRepo->insert($data);
    }
    
    public function updateSector($data) {
        return $this->sectorRepo->update($data);
    }
    
    public function removeSector($id) {
        return $this->sectorRepo->delete($id);
    }
}
