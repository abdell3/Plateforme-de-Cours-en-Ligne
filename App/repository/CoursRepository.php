<?php

require_once __DIR__ . '/../include.php'; 

class CoursRepository {

   
    public function getAllCourses() {
        $db = Database::getInstance();  
        $query = $db->prepare("SELECT * FROM cours");  
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC); 
    }

   
    public function addCours($titre, $description, $enseignant_id) {
        $db = Database::getInstance();
        $query = $db->prepare("INSERT INTO cours (titre, description, enseignant_id) VALUES (:titre, :description, :enseignant_id)");

        $query->bindParam(':titre', $titre);
        $query->bindParam(':description', $description);
        $query->bindParam(':enseignant_id', $enseignant_id);

        $query->execute();
    }
}
?>
