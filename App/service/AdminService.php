<?php

require_once __DIR__ . '/../Repository/GeneralRepository.php';

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

    public function getAllTeachers() {
        return $this->repository->readAll('users');
    }

    public function getAllStudents() {
        return $this->repository->readAll('users');
    }

    public function getAllCategories() {
        return $this->repository->readAll('categories'); 
    }

    public function getAllTags() {
        return $this->repository->readAll('tags');
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