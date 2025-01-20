<?php

require_once __DIR__ . '/../Service/AdminService.php';

if (isset($_GET['id'], $_GET['type'])) {
    $id = (int) $_GET['id'];
    $type = $_GET['type'];

    $adminService = new AdminService();
    try {
        switch ($type) {
            case 'etudiant':
                $adminService->delete('etudiants',$id);
                break;
            case 'enseignant':
                $adminService->delete('enseignats',$id);
                break;
            case 'cours':
                $adminService->delete('cours',$id);
                break;
            case 'tag':
                $adminService->delete('tags',$id);
                break;
            case 'category':
                $adminService->delete('categories',$id);
                break;
            default:
                throw new Exception("Type inconnu");
        }

        header('Location: /admin/dashboard.php');
        exit();
    } catch (Exception $e) {
        echo "Erreur : " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "ID ou type manquant.";
}
?>