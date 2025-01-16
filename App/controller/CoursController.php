<?php
require_once __DIR__ . '/../Controller/GeneralController.php';

class CourseController extends GeneralController {

    
    public function createCourse() {
        $this->create('cours', '');  
    }

    
    public function listCourses() {
        $this->listCourses();  
    }
}
?>
