<?php
require_once dirname(__DIR__, 1) . '/controller/EnseignantController.php';
// require_once dirname(__DIR__, 1) . '../Utils/Sessions.php';


Sessions::start();


$user = Sessions::get('user');
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] !== 2) {
    header("Location: /Plateforme-de-Cours-en-Ligne/Public/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Enseignant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<nav class="bg-white shadow">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="#" class="text-xl font-bold text-gray-800 hover:text-gray-700">Youdemy</a>
        <a href="#" class="text-gray-800 hover:text-gray-700">Déconnexion</a>
    </div>
</nav>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Dashboard Enseignant</h1>
    
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Mes cours</h2>
        <a href="./../Views/formes/Enseignant/CreateCour.php" class="bg-blue-500 text-white px-4 py-2 rounded">Créer un cours</a>
    </div>

    <?php if (empty($cours)): ?>
        <p class="text-gray-600">Vous n'avez pas encore créé de cours.</p>
    <?php else: ?>
        <ul class="bg-white p-6 rounded-lg shadow-md">
            <?php foreach ($cours as $cour): ?>
                <li class="mb-4 border-b pb-4">
                    <h3 class="text-xl font-bold"><?= htmlspecialchars($cour['titre']); ?></h3>
                    <p><?= htmlspecialchars($cour['description']); ?></p>
                    <div class="mt-2">
                        <a href="ModifierCours.php?id=<?= $cour['id']; ?>" class="text-blue-500 hover:underline">Modifier</a>
                        <a href="SupprimerCours.php?id=<?= $cour['id']; ?>" class="text-red-500 hover:underline ml-4">Supprimer</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

</body>
</html>
