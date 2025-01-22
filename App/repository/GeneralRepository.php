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

    
    public function readAll($table, $filters = []) 
    {
        $sql = "SELECT * FROM {$table}";

        switch ($table) {
            case 'users':
                $sql = "SELECT u.*, r.title AS role_title 
                        FROM users AS u 
                        LEFT JOIN roles AS r 
                        ON u.role_id = r.id";
                break;
            case 'cours':
                $sql = "SELECT c.*, u.nom AS enseignant_nom, u.prenom AS enseignant_prenom, cat.nom AS categorie_nom
                        FROM cours AS c
                        JOIN users AS u 
                        ON c.user_id = u.id
                        JOIN categories AS cat 
                        ON c.categorie_id = cat.id";
                break;
            case 'inscription':
                $sql = "SELECT i.*, u.nom, u.prenom, c.titre
                        FROM inscription AS i
                        JOIN users AS u 
                        ON i.user_id = u.id
                        JOIN cours AS c 
                        ON i.cours_id = c.id";
                break;
            case 'categories':
                $sql = "SELECT id, nom, smallDescription FROM categories";
                break;
            case 'tags':
                $sql = "SELECT id, nom FROM tags";
                break;
        }


        if (!empty($filters)) {
            $conditions = [];
                foreach ($filters as $column => $value) {
                     if ($table === 'categories') {
                        $conditions[] = "cat.{$column} LIKE :{$column}"; 
                    } elseif ($table === 'tags') {
                        $conditions[] = "t.{$column} LIKE :{$column}"; 
                    } elseif ($table === 'cours') {
                        $conditions[] = "c.{$column} LIKE :{$column}";
                    } else {
                        $conditions[] = "{$column} LIKE :{$column}";
                    }
    }
    $sql .= " WHERE " . implode(" AND ", $conditions);
        }


        $stmt = $this->db->prepare($sql);

        foreach ($filters as $column => $value) {
            $stmt->bindValue(":{$column}", "%{$value}%");
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

       public function readById($table, $id) 
        {   
            switch ($table) {
                case 'users':
                    $sql = "SELECT u.*, r.title AS role_title 
                            FROM users AS u
                            LEFT JOIN roles AS r 
                            ON u.role_id = r.id
                            WHERE u.id = :id";
                    break;
                case 'tags':
                case 'categories':
                    $sql = "SELECT * FROM {$table} WHERE id = :id";
                    break;
                case 'cours':
                    $sql = "SELECT c.*, u.nom AS enseignant_nom, u.prenom AS enseignant_prenom, cat.nom AS categorie_nom
                            FROM cours AS c
                            JOIN users AS u 
                            ON c.user_id = u.id
                            JOIN categories AS cat 
                            ON c.categorie_id = cat.id
                            WHERE c.id = :id";
                    break;
                case 'inscription':
                    $sql = "SELECT i.*, u.prenom, u.nom, c.titre
                            FROM inscription AS i
                            JOIN users AS u 
                            ON i.user_id = u.id
                            JOIN cours AS c 
                            ON i.cours_id = c.id
                            WHERE i.user_id = :id";
                    break;
                default:
                    $sql = "SELECT * FROM {$table} WHERE id = :id"; 
            }

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
              return $result; 
            }   
    
         return null; 
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



        public function readAllWithFilters($filters) 
        {
              $sql = "SELECT DISTINCT c.*, cat.nom AS categorie_nom, u.nom AS enseignant_nom, u.prenom AS enseignant_prenom
                     FROM cours AS c
                     JOIN categories AS cat ON c.categorie_id = cat.id
                     JOIN users AS u ON c.user_id = u.id
                     LEFT JOIN tagcours AS tc ON c.id = tc.cours_id
                     LEFT JOIN tags AS t ON tc.tag_id = t.id";

                $conditions = [];
                $params = [];

                if (!empty($filters['categorie'])) {
                       $conditions[] = "cat.nom = :categorie";
                       $params[':categorie'] = $filters['categorie'];
                }

                if (!empty($filters['tag'])) {
                        $conditions[] = "t.nom = :tag";
                        $params[':tag'] = $filters['tag'];
                }

                if (!empty($conditions)) {
                        $sql .= " WHERE " . implode(" AND ", $conditions);
                }

                $stmt = $this->db->prepare($sql);

                foreach ($params as $key => $value) {
                        $stmt->bindValue($key, $value);
                }

                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }



        public function findBy($table, $conditions)
        {
             $sql = "SELECT * FROM {$table} WHERE ";
             $sqlConditions = [];
             $params = [];

            foreach ($conditions as $column => $value) {
                $sqlConditions[] = "{$column} = ?";
                $params[] = $value;
            }

            $sql .= implode(' AND ', $sqlConditions);

            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        
}
?>