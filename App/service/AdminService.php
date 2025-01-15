<?php
require_once __DIR__ . '/../Repository/AdminRepository.php';  

class AdminService {

    private $adminRepository;

    public function __construct() {
        $this->adminRepository = new AdminRepository();  
    }

    
    public function createAdmin($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image) {
        $this->adminRepository->addAdmin($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image);
    }

    
    public function getAllAdmins() {
        return $this->adminRepository->getAllAdmins();
    }

    
    public function getAdminById($id) {
        return $this->adminRepository->getAdminById($id);
    }

    
    public function updateAdmin($id, $nom, $prenom, $email, $motDePasse, $role_id, $phone, $image) {
        $this->adminRepository->updateAdmin($id, $nom, $prenom, $email, $motDePasse, $role_id, $phone, $image);
    }

    
    public function deleteAdmin($id) {
        $this->adminRepository->delete($id);
    }
}
?>
