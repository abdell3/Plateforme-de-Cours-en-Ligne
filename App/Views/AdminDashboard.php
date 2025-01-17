<?php

require_once __DIR__ . '/../Service/AdminService.php';
$adminService = new AdminService();


$etudiants = $adminService->getAllStudents();
$enseignants = $adminService->getAllTeachers();
$tags = $adminService->readAllTags();
$categories = $adminService->readAllCategories();
$cours = $adminService->getAllCours();
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
</html>
