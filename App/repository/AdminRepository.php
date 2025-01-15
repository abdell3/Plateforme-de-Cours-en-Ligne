<?php
require_once __DIR__ . '/../Database.php';  

class AdminRepository {

    public function addAdmin($nom, $prenom, $email, $motDePasse, $role_id, $phone, $image) {
        $db = Database::getInstance();
        $query = $db->prepare("INSERT INTO utilisateurs (nom, prenom, email, motDePasse, role_id, phone, image) 
                               VALUES (:nom, :prenom, :email, :motDePasse, :role_id, :phone, :image)");

        $query->bindParam(':nom', $nom);
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':email', $email);
        $hashedPassword = password_hash($motDePasse, PASSWORD_DEFAULT);
        $query->bindParam(':motDePasse', $hashedPassword);
        $query->bindParam(':role_id', $role_id);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':image', $image);

        $query->execute();
    }

    public function getAllAdmins() {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM utilisateurs WHERE role_id = 3");  
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdminById($id) {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM utilisateurs WHERE id = :id AND role_id = 3");
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAdmin($id, $nom, $prenom, $email, $motDePasse, $role_id, $phone, $image) {
        $db = Database::getInstance();
        $query = $db->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, 
                                motDePasse = :motDePasse, role_id = :role_id, phone = :phone, image = :image 
                                WHERE id = :id");

        $query->bindParam(':id', $id);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':email', $email);
        $hashedPassword = password_hash($motDePasse, PASSWORD_DEFAULT);
        $query->bindParam(':motDePasse', $hashedPassword);
        $query->bindParam(':role_id', $role_id);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':image', $image);

        $query->execute();
    }

    
    public function delete($id) {
        $db = Database::getInstance();
        $query = $db->prepare("DELETE FROM utilisateurs WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }
}
?>
