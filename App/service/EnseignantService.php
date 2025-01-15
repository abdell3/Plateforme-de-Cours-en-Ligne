<?php
require_once __DIR__ . '/../Repository/EnseignantRepository.php';  

class EnseignantService {

    private $enseignantRepository;

    public function __construct() {
        $this->enseignantRepository = new EnseignantRepository();  
    }

    
    public function createEnseignant($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image) {
        
        $this->enseignantRepository->addEnseignant($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image);
    }


    public function getAllEnseignants() {
        return $this->enseignantRepository->getAllEnseignants();
    }

    
    public function getEnseignantById($id) {
        return $this->enseignantRepository->getEnseignantById($id);
    }

    
    public function updateEnseignant($id, $nom, $prenom, $email, $motDePasse, $role_id, $phone, $image) {
        $this->enseignantRepository->updateEnseignant($id, $nom, $prenom, $email, $motDePasse, $role_id, $phone, $image);
    }

    
    public function deleteEnseignant($id) {
        $this->enseignantRepository->delete($id);
    }
}
?>
