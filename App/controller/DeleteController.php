<?php

require_once __DIR__ . '/../include.php';

class DeleteController {

    private $etudiantService;
    private $enseignantService;
    private $adminService;

    public function __construct() {
        $this->etudiantService = new EtudiantService();
        $this->enseignantService = new EnseignantService();
        $this->adminService = new AdminService();  
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = $_POST['type'];  
            $id = $_POST['id'];  

            if ($type === 'etudiant') {
                
                $this->etudiantService->deleteEtudiant($id);

            } elseif ($type === 'enseignant') {
                
                $this->enseignantService->deleteEnseignant($id);

            } elseif ($type === 'admin') {
                
                $this->adminService->deleteAdmin($id);
            }
        }
    }
}
?>
