<?php
require_once __DIR__ . '/../Repository/AdminRepository.php';

class AdminService 
{
    private $repository;

    public function __construct() 
    {
        $this->repository = new GeneralRepository();
    }

    public function create($table, $data) 
    {
        return $this->repository->create($table, $data);
    }

    public function readAll($table) 
    {
        return $this->repository->readAll($table);
    }

    public function readById($table, $id) 
    {
        return $this->repository->readById($table, $id);
    }

    public function update($table, $data, $id) 
    {
        $this->repository->update($table, $data, $id);
    }

    public function delete($table, $id) 
    {
        $this->repository->delete($table, $id);
    }
}
?>