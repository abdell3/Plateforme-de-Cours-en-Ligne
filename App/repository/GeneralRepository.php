<?php
require_once __DIR__ . '/../config/Database.php';

class GeneralRepository 
{

    protected $db;
    
    
    public function __construct() 
    {
        $this->db = Database::getInstance();
    }

    
    public function create($table, $data) 
    {
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_map(function($value) {
            return "'" . $value . "'"; 
        }, array_values($data)));

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
        $stmt->execute();
        return $this->db->lastInsertId(); 
    }

    
    public function readAll($table) 
    {
        $sql = "SELECT * FROM {$table}";

        if ($table === 'users') {
            $sql = "SELECT u.*, r.title AS role_title FROM users u LEFT JOIN roles r ON u.role_id = r.id";
        } elseif ($table === 'cours') {
            $sql = "SELECT c.*, u.nom AS enseignant_nom, u.prenom AS enseignant_prenom, cat.nom AS categorie_nom
                    FROM cours c
                    JOIN users u ON c.user_id = u.id
                    JOIN categories cat ON c.categorie_id = cat.id";
        } elseif ($table === 'inscription') {
            $sql = "SELECT i.*, u.nom, u.prenom, c.titre
                    FROM inscription i
                    JOIN users u ON i.user_id = u.id
                    JOIN cours c ON i.cours_id = c.id";
        } elseif ($table === 'categories') {
            $sql = "SELECT id, nom AS categorie_nom, description FROM categories";
        } elseif ($table === 'tags') {
            $sql = "SELECT id, nom AS tag_nom FROM tags";
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


       public function readById($table, $id) 
        {   
          if ($table == 'users') {
            $sql = "SELECT u.*, r.title AS role_title FROM users u
            LEFT JOIN roles r ON u.role_id = r.id
            WHERE u.id = :id";
         } elseif ($table == 'tags' || $table == 'categories') {
            $sql = "SELECT * FROM {$table} WHERE id = :id";
         } elseif ($table == 'cours') {
            $sql = "SELECT c.*, u.nom AS enseignant_nom, u.prenom AS enseignant_prenom, cat.nom AS categorie_nom
                    FROM cours c
                    JOIN users u ON c.user_id = u.id
                    JOIN categories cat ON c.categorie_id = cat.id
                    WHERE c.id = :id";
         } elseif ($table == 'inscription') {
            $sql = "SELECT i.*, u.prenom, u.nom, c.titre
                    FROM inscription i
                    JOIN users u ON i.user_id = u.id
                    JOIN cours c ON i.cours_id = c.id
                    WHERE i.user_id = :id";
        } else {
            $sql = "SELECT * FROM {$table} WHERE id = :id"; 
        }

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
        }


    
        public function update($table, $data, $id) 
        {
            $set = '';
            foreach ($data as $column => $value) {
                $set .= "{$column} = :{$column}, ";
            }
            $set = rtrim($set, ", ");
        
            $sql = "UPDATE {$table} SET {$set} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
        
            foreach ($data as $column => $value) {
                $stmt->bindValue(":{$column}", $value);
            }
        
            $stmt->execute();
        }
        

    
        public function delete($table, $id) 
        {
            $sql = "DELETE FROM {$table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        
}
?>