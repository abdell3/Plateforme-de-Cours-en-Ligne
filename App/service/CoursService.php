<?php

require_once __DIR__ . '/../Repository/CoursRepository.php'; 

class CoursService 
{

    private $coursRepository;

    public function __construct() 
    {
        $this->coursRepository = new CoursRepository();  
    }

    public function getAllCourses() 
    {
        return $this->coursRepository->getAllCourses();
    }

    public function createCourse($titre, $description, $enseignant_id) 
    {
        $this->coursRepository->addCours($titre, $description, $enseignant_id);
    }
}
?>
