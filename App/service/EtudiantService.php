<?php
require_once __DIR__ . '/../Repository/GeneralRepository.php';

class EtudiantService {
    private $repo;

    public function __construct() {
        $this->repo = new GeneralRepository();
    }


    public function getCourseById($id) {
        $cour = $this->repo->readById('cours', $id);
        if ($cour) {
            return $cour;
        }
        return null; 
    }


    public function getAllCourses() {
        return $this->repo->readAll('cours');
    }

   
    public function searchCourses($filters) {
        return $this->repo->readAll('cours', $filters);
    }

    
    public function getCourseDetails($id) {
        $filters = ['id' => $id];
        $courses = $this->repo->readAll('cours', $filters);
        return $courses ? $courses[0] : null;
    }

    public function getAllCategories() {
        return $this->repo->readAll('categories');
    }

    public function getAllTags() {
        return $this->repo->readAll('tags');
    }


    public function getCoursesByFilters($filters) {
        return $this->repo->readAll('cours', $filters);
    }

    public function getFilteredCourses($categorie = null, $tag = null) 
    {
           $filters = [];

            if ($categorie) {
                $filters['categorie'] = $categorie;
            }
            if ($tag) {
                $filters['tag'] = $tag;
            }

            return $this->repo->readAllWithFilters($filters);
    }

}
