<?php
require_once __DIR__ . '/../Controller/GeneralController.php';
require_once __DIR__ . '/../Service/AdminService.php';

class AdminController extends GeneralController 
{
    private $adminService;

    public function __construct() 
    {
        parent::__construct();
        $this->adminService = new AdminService();
    }

    public function createEntity($table) 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data'];
            $this->adminService->create($table, $data);
            echo "Nouvelle entité créée avec succès dans la table {$table}.";
        }
    }

    public function listEntities($table) 
    {
        $entities = $this->adminService->readAll($table);
        echo json_encode($entities); // Ou passer les données à une vue
    }

    public function updateEntity($table, $id) 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data'];
            $this->adminService->update($table, $data, $id);
            echo "Entité mise à jour avec succès dans la table {$table}.";
        }
    }

    public function deleteEntity($table, $id) 
    {
        $this->adminService->delete($table, $id);
        echo "Entité supprimée avec succès de la table {$table}.";
    }

    public function dashboard() {
        // Récupérer les données nécessaires via AdminService
        $tags = $this->adminService->readAll('tags'); // Méthode générique
        $categories = $this->adminService->readAll('categories'); 
        $students = $this->adminService->readAll('etudiants');
        $teachers = $this->adminService->readAll('enseignants');
        $courses = $this->adminService->readAll('cours');
        
        // Passer les données à la vue du tableau de bord
        require_once __DIR__ . '/../Views/AdminDashboard.php';
    }
}
?>