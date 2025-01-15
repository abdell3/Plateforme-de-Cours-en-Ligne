<?php
require_once __DIR__ . '/../Repository/EtudiantRepository.php';  

class EtudiantService {

    private $etudiantRepository;

    public function __construct() {
        $this->etudiantRepository = new EtudiantRepository();  
    }

    
    public function createEtudiant($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image) {
        
        $this->etudiantRepository->addEtudiant($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image);
    }

    
    public function getAllEtudiants() {
        return $this->etudiantRepository->getAllEtudiants();
    }

   
    public function getEtudiantById($id) {
        return $this->etudiantRepository->getEtudiantById($id);
    }

   
    public function updateEtudiant($id, $nom, $prenom, $email, $motDePasse, $role_id, $phone, $image) {
        $this->etudiantRepository->updateEtudiant($id, $nom, $prenom, $email, $motDePasse, $role_id, $phone, $image);
    }

   
    public function deleteEtudiant($id) {
        $this->etudiantRepository->delete($id);
    }
}
?>

