<?php
require_once dirname(__DIR__, 3) . '/service/EtudiantService.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Identifiant du cours manquant !");
}

$etudiantService = new EtudiantService();
try {
    $id = intval($_GET['id']);
    $course = $etudiantService->getCourseById($id);
    if (!$course) {
        die("Cours non trouvé !");
    }
} catch (Exception $e) {
    die("Erreur lors de la récupération des détails du cours : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Cours - <?= htmlspecialchars($course['titre']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<nav class="bg-white shadow">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="#" class="text-xl font-bold text-gray-800 hover:text-gray-700">Youdemy</a>
        <div>
            <a href="/../App/Views/Etudiant/EtudiantDashboard.php" class="text-gray-800 hover:text-gray-700 mx-4">Tableau de Bord</a>
            <a href="#" class="text-gray-800 hover:text-gray-700 mx-4">Mon Compte</a>
            <a href="#" class="text-gray-800 hover:text-gray-700 mx-4">Déconnexion</a>
        </div>
    </div>
</nav>

<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <img src="<?= htmlspecialchars($course['photo']); ?>" alt="Image de <?= htmlspecialchars($course['titre']); ?>" class="rounded-lg mb-6 w-full h-64 object-cover">
        <h1 class="text-3xl font-bold mb-4"><?= htmlspecialchars($course['titre']); ?></h1>
        <p class="text-gray-600 mb-4"><strong>Description :</strong> <?= htmlspecialchars($course['description']); ?></p>
        <p class="text-gray-600 mb-4"><strong>Catégorie :</strong> <?= htmlspecialchars($course['categorie_nom']); ?></p>
        <p class="text-gray-600 mb-4"><strong>Enseignant :</strong> <?= htmlspecialchars($course['enseignant_prenom']) . " " . htmlspecialchars($course['enseignant_nom']); ?></p>
        <p class="text-gray-600 mb-4"><strong>Contenue :</strong></p>
        <div class="bg-gray-100 p-4 rounded-lg mb-6">
            <?= nl2br(htmlspecialchars($course['contenue'])); ?>
        </div>
        <a href="../../EtudiantDashboard.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Retour aux Cours
        </a>
    </div>
</div>

<footer class="bg-gray-800 text-white py-4 mt-6">
    <div class="container mx-auto text-center">
        <p>© 2025 Youdemy. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>
