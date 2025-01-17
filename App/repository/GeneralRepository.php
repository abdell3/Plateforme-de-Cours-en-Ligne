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
        $stmt->execute();
        return $this->db->lastInsertId(); 
    }

    
    public function readAll($table) 
    {
        
        if ($table == 'etudiants') {
            $sql = "SELECT u.*, e.* FROM users u JOIN etudiants e ON u.id = e.id";
        } elseif ($table == 'enseignants') {
            $sql = "SELECT u.*, en.* FROM users u JOIN enseignants en ON u.id = en.id";
        } 
        // elseif ($table == 'tags' || $table == 'categories') {
        //     $sql = "SELECT d.nom, d.smallDescription, d.logo, {$table}.* 
        //             FROM detail d
        //             JOIN {$table} t ON d.id = t.detail_id"; 
        // }
          elseif ($table == 'cours') {
            $sql = "SELECT c.*, u.nom AS enseignant_nom, u.prenom AS enseignant_prenom
                    FROM cours c
                    JOIN enseignants e ON c.enseignant_id = e.id
                    JOIN users u ON e.id = u.id"; 
        } else {
            $sql = "SELECT * FROM {$table}"; 
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function readById($table, $id) 
    {
        if ($table == 'etudiants') {
            $sql = "SELECT u.*, e.* FROM users u JOIN etudiants e ON u.id = e.id WHERE e.id = :id";
        } elseif ($table == 'enseignants') {
            $sql = "SELECT u.*, en.* FROM users u JOIN enseignants en ON u.id = en.id WHERE en.id = :id";
        } elseif ($table == 'tags' || $table == 'categories') {
            $sql = "SELECT * FROM {$table} WHERE id = :id";
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
            $set .= "{$column} = '{$value}', ";
        }
        $set = rtrim($set, ", ");

        $sql = "UPDATE {$table} SET {$set} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
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