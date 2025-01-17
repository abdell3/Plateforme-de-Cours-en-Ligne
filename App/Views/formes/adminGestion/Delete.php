<?php


require_once __DIR__ . '/../../App/Service/AdminService.php'; 


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $type = $_GET['type']; 
    
    $adminService = new AdminService();
    
    switch ($type) {
        case 'etudiant':
            $adminService->deleteStudent($id);
            break;
        case 'enseignant':
            $adminService->deleteTeacher($id);
            break;
        case 'cours':
            $adminService->deleteCour($id);
            break;
        case 'tag':
            $adminService->deleteTag($id);
            break;
        case 'category':
            $adminService->deleteCategory($id);
            break;
    }
    
    header('Location: /admin/dashboard.php'); 
    exit();
} else {
    echo "ID de l'élément manquant.";
}
?>
