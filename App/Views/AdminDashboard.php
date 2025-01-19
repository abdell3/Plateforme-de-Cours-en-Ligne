<!-- <?php

// require_once __DIR__ . '/../Service/AdminService.php';
// $adminService = new AdminService();


// $etudiants = $adminService->getAllStudents();
// $enseignants = $adminService->getAllTeachers();
// $tags = $adminService->readAllTags();
// $categories = $adminService->readAllCategories();
// $cours = $adminService->getAllCours();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin - Youdemy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold text-center mb-6">Tableau de bord Admin - Youdemy</h1>
        
        <div class="mb-8">
            <h2 class="text-2xl font-semibold">Étudiants</h2>
            <a href="/../app/views/forms/CreateEtudiant.php" class="text-blue-500">Ajouter un étudiant</a>
            <table class="min-w-full bg-white shadow-md rounded-lg mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Nom</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <tr>
                            <td class="px-4 py-2 border"><?= $etudiant['id'] ?></td>
                            <td class="px-4 py-2 border"><?= $etudiant['nom'] . ' ' . $etudiant['prenom'] ?></td>
                            <td class="px-4 py-2 border"><?= $etudiant['email'] ?></td>
                            <td class="px-4 py-2 border">
                                <a href="forms/updateStudent.php?id=<?= $etudiant['id'] ?>" class="text-yellow-500">Modifier</a>
                                <a href="delete.php?id=<?= $etudiant['id'] ?>&type=student" class="text-red-500 ml-2">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="mb-8">
            <h2 class="text-2xl font-semibold">Enseignants</h2>
            <a href="forms/createTeacher.php" class="text-blue-500">Ajouter un enseignant</a>
            <table class="min-w-full bg-white shadow-md rounded-lg mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Nom</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enseignants as $enseignant): ?>
                        <tr>
                            <td class="px-4 py-2 border"><?= $enseignant['id'] ?></td>
                            <td class="px-4 py-2 border"><?= $enseignant['nom'] . ' ' . $enseignant['prenom'] ?></td>
                            <td class="px-4 py-2 border"><?= $enseignant['email'] ?></td>
                            <td class="px-4 py-2 border">
                                <a href="forms/updateTeacher.php?id=<?= $enseignant['id'] ?>" class="text-yellow-500">Modifier</a>
                                <a href="delete.php?id=<?= $enseignant['id'] ?>&type=teacher" class="text-red-500 ml-2">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="mb-8">
            <h2 class="text-2xl font-semibold">Cours</h2>
            <a href="forms/createCourse.php" class="text-blue-500">Ajouter un cours</a>
            <table class="min-w-full bg-white shadow-md rounded-lg mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Titre</th>
                        <th class="px-4 py-2 border">Enseignant</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cours as $cour): ?>
                        <tr>
                            <td class="px-4 py-2 border"><?= $cour['id'] ?></td>
                            <td class="px-4 py-2 border"><?= $cour['titre'] ?></td>
                            <td class="px-4 py-2 border"><?= $cour['enseignant_nom'] ?></td>
                            <td class="px-4 py-2 border"><?= $cour['enseignant_prenom'] ?></td>
                            <td class="px-4 py-2 border">
                                <a href="forms/updateCourse.php?id=<?= $cour['id'] ?>" class="text-yellow-500">Modifier</a>
                                <a href="delete.php?id=<?= $cour['id'] ?>&type=course" class="text-red-500 ml-2">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mb-8">
            <h2 class="text-2xl font-semibold">Tags</h2>
            <a href="forms/createTag.php" class="text-blue-500">Ajouter un tag</a>
            <table class="min-w-full bg-white shadow-md rounded-lg mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Nom</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tags as $tag): ?>
                        <tr>
                            <td class="px-4 py-2 border"><?= $tag['id'] ?></td>
                            <td class="px-4 py-2 border"><?= $tag['nom'] ?></td>
                            <td class="px-4 py-2 border"><?= $tag['smallDescription'] ?></td>
                            <td class="px-4 py-2 border"><?= $tag['logo'] ?></td>
                            <td class="px-4 py-2 border">
                                <a href="forms/updateTag.php?id=<?= $tag['id'] ?>" class="text-yellow-500">Modifier</a>
                                <a href="delete.php?id=<?= $tag['id'] ?>&type=tag" class="text-red-500 ml-2">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mb-8">
            <h2 class="text-2xl font-semibold">Catégories</h2>
            <a href="forms/createCategory.php" class="text-blue-500">Ajouter une catégorie</a>
            <table class="min-w-full bg-white shadow-md rounded-lg mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Nom</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $categorie): ?>
                        <tr>
                            <td class="px-4 py-2 border"><?= $categorie['id'] ?></td>
                            <td class="px-4 py-2 border"><?= $categorie['nom'] ?></td>
                            <td class="px-4 py-2 border">
                                <a href="forms/updateCategory.php?id=<?= $categorie['id'] ?>" class="text-yellow-500">Modifier</a>
                                <a href="delete.php?id=<?= $categorie['id'] ?>&type=category" class="text-red-500 ml-2">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html> -->



<?php

// **Validation Function**
function validateInput($input, $type = 'string') {
    $input = trim($input);
    if ($type === 'email') {
        return filter_var($input, FILTER_VALIDATE_EMAIL);
    } elseif ($type === 'string') {
        return !empty($input);
    } elseif ($type === 'array') {
        return is_array($input) && count($input) > 0;
    }
    return false;
}

// **Service Initialization**
require_once __DIR__ . '/../Service/AdminService.php';
$adminService = new AdminService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    // Extract and validate inputs for forms
    if (isset($_POST['form_type'])) {
        switch ($_POST['form_type']) {
            case 'createCategory':
                $nom = $_POST['nom'] ?? '';
                if (!validateInput($nom)) {
                    $errors[] = 'Le nom de la catégorie est invalide ou vide.';
                }
                if (empty($errors)) {
                    $adminService->create(['nom' => $nom]);
                    header('Location: ../AdminDashboard.php');
                    exit;
                }
                break;

            case 'createTeacher':
                $nom = $_POST['nom'] ?? '';
                $prenom = $_POST['prenom'] ?? '';
                $email = $_POST['email'] ?? '';

                if (!validateInput($nom)) {
                    $errors[] = 'Le nom est invalide ou vide.';
                }
                if (!validateInput($prenom)) {
                    $errors[] = 'Le prénom est invalide ou vide.';
                }
                if (!validateInput($email, 'email')) {
                    $errors[] = "L'email est invalide.";
                }
                if (empty($errors)) {
                    $adminService->create(['nom' => $nom, 'prenom' => $prenom, 'email' => $email]);
                    header('Location: ../AdminDashboard.php');
                    exit;
                }
                break;

            case 'createStudent':
                $nom = $_POST['nom'] ?? '';
                $prenom = $_POST['prenom'] ?? '';
                $email = $_POST['email'] ?? '';

                if (!validateInput($nom)) {
                    $errors[] = 'Le nom est invalide ou vide.';
                }
                if (!validateInput($prenom)) {
                    $errors[] = 'Le prénom est invalide ou vide.';
                }
                if (!validateInput($email, 'email')) {
                    $errors[] = "L'email est invalide.";
                }
                if (empty($errors)) {
                    $adminService->createStudent(['nom' => $nom, 'prenom' => $prenom, 'email' => $email]);
                    header('Location: ../AdminDashboard.php');
                    exit;
                }
                break;

            case 'createTags':
                $tags = $_POST['tags'] ?? '';
                $tagsArray = array_filter(array_map('trim', explode(',', $tags)));

                if (!validateInput($tagsArray, 'array')) {
                    $errors[] = 'Au moins un tag valide est requis.';
                }
                if (empty($errors)) {
                    foreach ($tagsArray as $tagName) {
                        $adminService->createTag(['nom' => $tagName]);
                    }
                    header('Location: ../AdminDashboard.php');
                    exit;
                }
                break;
        }
    }
}

// **Error Handling for Display**
function displayErrors($errors) {
    if (!empty($errors)) {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">';
        foreach ($errors as $error) {
            echo '<p>' . htmlspecialchars($error) . '</p>';
        }
        echo '</div>';
    }
}
?>

<!-- Example HTML Form (Create Category) -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold">Ajouter une Catégorie</h1>
        <?php displayErrors($errors ?? []); ?>
        <form method="POST" class="mt-6">
            <input type="hidden" name="form_type" value="createCategory">
            <label for="nom" class="block text-lg">Nom</label>
            <input type="text" name="nom" class="mt-2 p-2 border w-full" required>
            <button type="submit" class="mt-4 bg-blue-500 text-white p-2">Ajouter</button>
        </form>
    </div>
</body>
</html>