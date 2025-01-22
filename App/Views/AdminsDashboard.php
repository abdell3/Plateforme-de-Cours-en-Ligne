<?php
require_once __DIR__ . '/../Service/AdminService.php';
$adminService = new AdminService();

try {
    $categories = $adminService->getAllCategories();
    $enseignants = $adminService->getAllTeachers();
    $etudiants = $adminService->getAllStudents();
    $tags = $adminService->getAllTags();
} catch (Exception $e) {
    die("Erreur lors de la récupération des données : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur - Youdemy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">


<nav class="bg-white shadow">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="#" class="text-xl font-bold text-gray-800 hover:text-gray-700">Youdemy</a>
        <div>
            <a href="#" class="text-gray-800 hover:text-gray-700 mx-4">Accueil</a>
            <a href="#" class="text-gray-800 hover:text-gray-700 mx-4">Mon Compte</a>
            <a href="#" class="text-gray-800 hover:text-gray-700 mx-4">Déconnexion</a>
        </div>
    </div>
</nav>

<div class="flex">
    
    <aside class="w-64 bg-gray-800 text-white h-screen hidden md:block">
        <div class="p-6">
            <h2 class="text-2xl font-semibold">Youdemy Admin</h2>
        </div>
        <nav>
            <a href="#categories" class="block px-4 py-2 hover:bg-gray-700">Catégories</a>
            <a href="#enseignants" class="block px-4 py-2 hover:bg-gray-700">Enseignants</a>
            <a href="#etudiants" class="block px-4 py-2 hover:bg-gray-700">Étudiants</a>
            <a href="#tags" class="block px-4 py-2 hover:bg-gray-700">Tags</a>
        </nav>
    </aside>

   
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-semibold mb-6">Tableau de Bord Administrateur</h1>

        
        <section id="categories" class="mb-6">
            <h2 class="text-2xl font-semibold mb-4">Catégories</h2>
            <a href="/../Views/formes/adminGestion/CreateCategorie.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter une Catégorie</a>
            <table class="w-full bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $categorie): ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?= htmlspecialchars($categorie['id']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($categorie['nom']); ?></td>
                            <td class="px-4 py-2">
                                <a href="/../Views/formes/adminGestion/Delete.php?id=<?= $categorie['id']; ?>&type=category" class="text-red-500">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        
        <section id="enseignants" class="mb-6">
            <h2 class="text-2xl font-semibold mb-4">Enseignants</h2>
            <a href="/../Views/formes/adminGestion/CreateEnseignant.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter un Enseignant</a>
            <table class="w-full bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Prénom</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enseignants as $enseignant): ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?= htmlspecialchars($enseignant['id']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($enseignant['nom']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($enseignant['prenom']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($enseignant['email']); ?></td>
                            <td class="px-4 py-2">
                                <a href="/../Views/formes/adminGestion/Delete.php?id=<?= $enseignant['id']; ?>&type=teacher" class="text-red-500">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        
        <section id="etudiants" class="mb-6">
            <h2 class="text-2xl font-semibold mb-4">Étudiants</h2>
            <a href="/../Views/formes/adminGestion/CreateEtudiant.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter un Étudiant</a>
            <table class="w-full bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Prénom</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?= htmlspecialchars($etudiant['id']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($etudiant['nom']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($etudiant['prenom']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($etudiant['email']); ?></td>
                            <td class="px-4 py-2">
                                <a href="/../Views/formes/adminGestion/Delete.php?id=<?= $etudiant['id']; ?>&type=student" class="text-red-500">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        
        <section id="tags" class="mb-6">
            <h2 class="text-2xl font-semibold mb-4">Tags</h2>
            <a href="/../Views/formes/adminGestion/CreateTag.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter un Tag</a>
            <table class="w-full bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tags as $tag): ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?= htmlspecialchars($tag['id']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($tag['nom']); ?></td>
                            <td class="px-4 py-2">
                                <a href="/../Views/formes/adminGestion/Delete.php?id=<?= $tag['id']; ?>&type=tag" class="text-red-500">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</div>


<footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
        <p>© 2025 Youdemy. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>
