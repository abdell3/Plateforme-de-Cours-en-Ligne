
<?php
require_once dirname(__DIR__, 1) . '/service/EnseignantService.php';
require_once dirname(__DIR__, 2) . '/App/Utils/Sessions.php';

    class EnseignantController
{
    private $service;

    public function __construct()
    {
        $this->service = new EnseignantService();
        Sessions::start();
    }

    public function afficherCours($enseignantId)
    {
        return $this->service->getCoursesByEnseignant($enseignantId);
    }

    public function creerCours($data)
    {
        $this->service->createCourse($data);
    }

    public function modifierCours($id, $data)
    {
        $this->service->updateCourse($id, $data);
    }

    public function supprimerCours($id)
    {
        $this->service->deleteCourse($id);
    }


    public function getAllCategories()
{
    return $this->service->getAllCategories();
}

    public function getAllTags()
    {
        return $this->service->getAllTags();
    }

    public function creerCoursAvecTags($data, $tags)
    {
      $this->service->createCourseWithTags($data, $tags);
    }


    public function handleRequest($action)
    {
        $user = Sessions::get('user');
        if (!$user || $user['role'] !== 'enseignant') {
            header('Location: /Public/login.php');
            exit;
        }

        switch ($action) {
            case 'dashboard':
                $this->dashboard();
                break;
            case 'createCourse':
                $this->showCreateCourseForm();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                echo "Action inconnue.";
        }
    }

    private function dashboard()
    {
        require dirname(__DIR__, 2) . '/views/EnseignantDashboard.php';
    }

    private function showCreateCourseForm()
    {
        require dirname(__DIR__, 2) . '/views/enseignant/CreateCourse.php';
    }

    private function logout()
    {
        Sessions::destroy();
        header('Location: /Public/login.php');
        exit;
    }
}
