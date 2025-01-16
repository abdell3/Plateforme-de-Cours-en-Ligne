<?php
require_once __DIR__ . '/../Controller/GeneralController.php';

class AdminController extends GeneralController {
     
    private $adminService;

    public function createTag() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data']; 
            $this->create('tags', $data); 
        }
    }

    
    public function createCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data']; 
            $this->create('categories', $data); 
        }
    }


    public function createStudent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data']; 
            $this->create('etudiants', $data);
        }
    }


    public function createTeacher() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data']; 
            $this->create('enseignants', $data);
        }
    }



    
    public function listTags() {
        $tags = $this->readAll('tags'); 
        require_once __DIR__ . '/../Views/listTags.php'; 
    }

    
    public function listCategories() {
        $categories = $this->readAll('categories'); 
        require_once __DIR__ . '/../Views/listCategories.php'; 
    }

    public function listStudents() {
        $students = $this->readAll('etudiants'); 
        require_once __DIR__ . '/../Views/listStudents.php'; 
    }


    public function listTeachers() {
        $teachers = $this->readAll('enseignants');
        require_once __DIR__ . '/../Views/listTeachers.php';
    }

    
    public function deleteTag($id) {
        $this->delete('tags', $id); 
    }

    
    public function deleteCategory($id) {
        $this->delete('categories', $id); 
    }

    public function deleteStudent($id) {
        $this->delete('etudiants', $id);
    }

    public function deleteTeacher($id) {
        $this->delete('enseignants', $id);
    }


    public function dashboard() {
        $tags = $this->adminService->readAllTags();
        $categories = $this->adminService->readAllCategories();
        $students = $this->adminService->getAllStudents();
        $teachers = $this->adminService->getAllTeachers();

        require_once __DIR__ . '/../Views/dashboard.php';
    }
}
?>
