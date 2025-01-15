<?php

require_once __DIR__ . '/../include.php';


class CreateController {

    private $etudiantService;
    private $enseignantService;
    private $adminService;

    public function __construct() {
        $this->etudiantService = new EtudiantService();
        $this->enseignantService = new EnseignantService();
        $this->adminService = new AdminService();  
    }

    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = $_POST['type'];  

            
            if ($type === 'etudiant') {
                
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $motDePasse = $_POST['motDePasse'];
                $role_id = $_POST['role_id'];  
                $phone = $_POST['phone'];
                $image = $_POST['image'];

                $this->etudiantService->createEtudiant($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image);

            } elseif ($type === 'enseignant') {
                
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $motDePasse = $_POST['motDePasse'];
                $role_id = $_POST['role_id'];  
                $phone = $_POST['phone'];
                $image = $_POST['image'];

                $this->enseignantService->createEnseignant($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image);

            } elseif ($type === 'admin') {
                
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $motDePasse = $_POST['motDePasse'];
                $role_id = $_POST['role_id'];  
                $phone = $_POST['phone'];
                $image = $_POST['image'];

                $this->adminService->createAdmin($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image);
            }
        }
    }
}


?>