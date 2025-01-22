<?php
require_once __DIR__ . '/../Service/EtudiantService.php';

    class EtudiantController
     {
        private $service;

        public function __construct() {
        $this->service = new EtudiantService();
    }

        public function showCourses() {
        $courses = $this->service->getAllCourses();
        include __DIR__ . '/../Views/EtudiantDashboard.php'; 
    }
        public function searchCourses() {
        $filters = [];
        if (isset($_GET['search'])) {
            $filters['titre'] = '%' . $_GET['search'] . '%';
        }

        $courses = $this->service->searchCourses($filters);
        include __DIR__ . '/../Views/EtudiantDashboard.php'; 
    }

    public function showCourseDetails($id) {
        if (isset($id)) {
            $cour = $this->service->getCourseById($id);
            
            if (!$cour) {
                echo "Aucun cours trouvé pour l'ID : {$id}";
                return; 
            }
            
            include __DIR__ . '/../Views/CourDetail.php'; 
        } else {
            echo "ID du cours manquant";
        }
    }

    public function handleDashboardRequest() {
        try {
            $filters = [];

            if (!empty($_GET['category'])) {
                $filters['id'] = $_GET['category'];
            }
            if (!empty($_GET['tag'])) {
                $filters['id'] = $_GET['tag'];
            }
            if (!empty($_GET['search'])) {
                $filters['search'] = $_GET['search'];
            }

            if (!empty($filters)) {
                $cours = $this->service->getCoursesByFilters($filters);
            } else {
                $cours = $this->service->getAllCourses();
            }

            $categories = $this->service->getAllCategories();
            $tags = $this->service->getAllTags();

            require_once __DIR__ . '/../Views/DashboardEtudiant.php';

        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage());
        }
    }


    public function showFilteredCourses() 
    {
            $categorie = isset($_GET['categorie']) ? $_GET['categorie'] : null;
            $tag = isset($_GET['tag']) ? $_GET['tag'] : null;

            $courses = $this->service->getFilteredCourses($categorie, $tag);

            require_once __DIR__ . '/../views/etudiant/coursesList.php';
    }


}