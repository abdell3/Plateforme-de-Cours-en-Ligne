<?php


require_once __DIR__ . '/../Repository/AdminRepository.php';

class AdminService {

    private $adminRepository;

    public function __construct() {
        $this->adminRepository = new AdminRepository();
    }

    
    public function createTag($data) {
        return $this->adminRepository->create('tags', $data);
    }

    
    public function createCategory($data) {
        return $this->adminRepository->create('categories', $data);
    }

    
    public function readAllTags() {
        return $this->adminRepository->readAll('tags');
    }

    
    public function readAllCategories() {
        return $this->adminRepository->readAll('categories');
    }

    
    public function deleteTag($id) {
        return $this->adminRepository->delete('tags', $id);
    }

    
    public function deleteCategory($id) {
        return $this->adminRepository->delete('categories', $id);
    }


    public function createStudent($data) {
        return $this->adminRepository->create('etudiants', $data);
    }


    public function getAllStudents() {
        return $this->adminRepository->readAll('etudiants');
    }

    public function deleteStudent($id) {
        return $this->adminRepository->delete('etudiants', $id);
    }

    public function updateStudent($data, $id) {
        return $this->adminRepository->update('etudiants', $data, $id);
    }


    public function createTeacher($data) {
        return $this->adminRepository->create('enseignants', $data);
    }

    public function getAllTeachers() {
        return $this->adminRepository->readAll('enseignants');
    }

    public function deleteTeacher($id) {
        return $this->adminRepository->delete('enseignants', $id);
    }

    public function updateTeacher($data, $id) {
        return $this->adminRepository->update('enseignants', $data, $id);
    }


}

?>
