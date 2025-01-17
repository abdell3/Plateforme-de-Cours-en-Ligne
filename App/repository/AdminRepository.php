<?php 

require_once __DIR__ . '/../Repository/GeneralRepository.php';

class AdminRepository extends GeneralRepository
{

    public function createStudent($data) {
        return $this->create('etudiants', $data);
    }


    public function getAllStudents() {
        return $this->readAll('etudiants');
    }

    public function deleteStudent($id) {
        return $this->delete('etudiants', $id);
    }


    public function updateStudent($data, $id) {
        return $this->update('etudiants', $data, $id);
    }

    public function createTeacher($data) {
        return $this->create('enseignants', $data);
    }


    public function getAllTeachers() {
        return $this->readAll('enseignants');
    }


    public function deleteTeacher($id) {
        return $this->delete('enseignants', $id);
    }


    public function updateTeacher($data, $id) {
        return $this->update('enseignants', $data, $id);
    }

    public function getAllCours() {
        return $this->readAll('cours');
    }

    public function deleteCour($id) {
        return $this->delete('cours', $id);
    }

    public function updateCour($data, $id) {
        return $this->update('cours', $data, $id);
    }


    public function createTag($data) {
        return $this->create('tags', $data);
    }

    
    public function createCategory($data) {
        return $this->create('categories', $data);
    }

    
    public function readAllTags() {
        return $this->readAll('tags');
    }

    
    public function readAllCategories() {
        return $this->readAll('categories');
    }

    
    public function deleteTag($id) {
        return $this->delete('tags', $id);
    }

    
    public function deleteCategory($id) {
        return $this->delete('categories', $id);
    }
}

?>