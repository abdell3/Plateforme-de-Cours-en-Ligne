<?php
require_once dirname(__DIR__, 1) . '/repository/GeneralRepository.php';

class EnseignantService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new GeneralRepository();
    }

    public function getAllCategories()
    {
        return $this->repository->readAll('categories');
    }

    public function getAllTags()
    {
        return $this->repository->readAll('tags');
    }

    public function createCourseWithTags($data, $tags)
    {
       
        $courseId = $this->repository->create('cours', $data);

        foreach ($tags as $tagId) {
            $this->repository->create('tagcours', [
                'tag_id' => $tagId,
                'course_id' => $courseId
            ]);
        }

        return $courseId;
    }

    public function afficherCours($enseignantId)
    {
        $conditions = ['enseignant_id' => $enseignantId];
        return $this->repository->findBy('cours', $conditions);
    }

    public function getCoursesByEnseignant($enseignantId)
    {
        $conditions = ['enseignant_id' => $enseignantId];
        return $this->repository->findBy('cours', $conditions);
    }

    public function createCourse($data)
    {
        $this->repository->create('cours', $data);
    }

    public function updateCourse($id, $data)
    {
        $conditions = ['id' => $id];
        $this->repository->update('cours', $data, $conditions);
    }

    public function deleteCourse($id)
    {
        $conditions = ['id' => $id];
        $this->repository->delete('cours', $conditions);
    }
}
