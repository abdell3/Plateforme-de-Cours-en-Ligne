<?php
require_once __DIR__ . '/../Service/EtudiantService.php';
$etudiantService = new EtudiantService();

try {
    $categories = $etudiantService->getAllCategories();
    $tags = $etudiantService->getAllTags();

    
    $filters = [];

    if (!empty($_GET['category'])) {
        $filters['id'] = $_GET['category'];
    }

    if (!empty($_GET['tag'])) {
        $filters['id'] = $_GET['tag'];
    }

    if (!empty($_GET['search'])) {
        $filters['search'] = $_GET['search'];
    }

    $cours = $etudiantService->getCoursesByFilters($filters);
} catch (Exception $e) {
    die("Erreur lors de la récupération des données : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Étudiant - Youdemy</title>
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
            <h2 class="text-2xl font-semibold">Youdemy Étudiant</h2>
        </div>
        <nav>
            <a href="#courses" class="block px-4 py-2 hover:bg-gray-700">Mes Cours</a>
            <a href="#recherche" class="block px-4 py-2 hover:bg-gray-700">Recherche de Cours</a>
        </nav>
    </aside>

    
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-semibold mb-6">Tableau de Bord Étudiant</h1>

        
        <section id="recherche" class="mb-6">
            <h2 class="text-2xl font-semibold mb-4">Recherche de Cours</h2>
            <form method="GET" action="">
                <div class="flex space-x-4 mb-4">
                    <input type="text" name="search" placeholder="Rechercher un cours..." class="p-2 w-full rounded-lg border border-gray-300" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Rechercher</button>
                </div>
                <div class="flex space-x-4 mb-4">
                    <select name="category" class="p-2 w-full rounded-lg border border-gray-300">
                        <option value="">Choisir une catégorie</option>
                        <?php foreach ($categories as $categorie): ?>
                            <option value="<?= $categorie['id']; ?>" <?= isset($_GET['category']) && $_GET['category'] == $categorie['id'] ? 'selected' : '' ?>><?= htmlspecialchars($categorie['nom']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="tag" class="p-2 w-full rounded-lg border border-gray-300">
                        <option value="">Choisir un tag</option>
                        <?php foreach ($tags as $tag): ?>
                            <option value="<?= $tag['id']; ?>" <?= isset($_GET['tag']) && $_GET['tag'] == $tag['id'] ? 'selected' : '' ?>><?= htmlspecialchars($tag['nom']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Filtrer</button>
                </div>
            </form>
        </section>

        
        <section id="courses" class="mb-6">
            <h2 class="text-2xl font-semibold mb-4">Cours Disponibles</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (empty($cours)): ?>
                    <p>Aucun cours trouvé.</p>
                <?php else: ?>
                    <?php foreach ($cours as $cour): ?>
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <img src="<?= htmlspecialchars($cour['photo']); ?>" alt="Image de <?= htmlspecialchars($cour['titre']); ?>" class="rounded-t-lg mb-4 w-full h-48 object-cover">
                            <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($cour['titre']); ?></h3>
                            <p class="text-gray-600 mb-4"><?= htmlspecialchars($cour['description']); ?></p>
                            <a href="./formes/Etudiant/CourDetail.php?id=<?= $cour['id']; ?>" class="text-blue-500 hover:underline">Voir les détails</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

       
        <section id="courseDetails" class="mb-6">
            
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
