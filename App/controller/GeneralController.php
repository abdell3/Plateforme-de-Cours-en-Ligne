<?php
require_once __DIR__ . '/../Service/GeneralService.php';

class GeneralController 
{

    private $service;

    public function __construct() 
    {
        $this->service = new GeneralService();
    }

    
    public function create($table, $data) 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $table = $_POST['table'];  
            $data = $_POST['data'];   


            $id = $this->service->cre
            ate($table, $data);
            echo "Entité créée avec l'ID : " . $id;
        }
    }

    
    public function readAll($table) 
    {
        if (isset($_GET['table'])) {
            $table = $_GET['table'];  
            $entities = $this->service->readAll($table);
            var_dump($entities);  
            return $entities;
        }
    }

    
    public function readById($table, $id) 
    {
        if (isset($_GET['table']) && isset($_GET['id'])) {
            $table = $_GET['table'];  
            $id = $_GET['id'];        
            $entity = $this->service->readById($table, $id);
            var_dump($entity);  
        }
    }
    
    public function update($table, $id) 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $table = $_POST['table'];  
            $data = $_POST['data'];    
            $id = $_POST['id'];        

            $this->service->update($table, $data, $id);
            echo "Entité mise à jour";
        }
    }
    

    
    public function delete($table, $id) 
    {
        if (isset($_GET['table']) && isset($_GET['id'])) {
            $table = $_GET['table'];  
            $id = $_GET['id'];        

            $this->service->delete($table, $id);
            echo "Entité supprimée";
        }
    }
}
?>