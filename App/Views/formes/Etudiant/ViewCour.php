<!-- <?php
// require_once __DIR__ . '/../Service/EtudiantService.php';
// $etudiantService = new EtudiantService();

// if (!isset($_GET['id']) || empty($_GET['id'])) {
//     die('Le paramètre ID est manquant.');
// }

// $courseId = $_GET['id'];

// try {
    
//     $cours = $etudiantService->getCourseById($courseId); 
//     if (empty($cours)) {
//         die("Aucun cours trouvé avec l'ID : $courseId");
//     }

    
//     $categories = $etudiantService->getAllCategories();
//     $tags = $etudiantService->getAllTags();

// } catch (Exception $e) {
//     die("Erreur lors de la récupération des données : " . $e->getMessage());
// }
// ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-6">Détails du Cours: <?= htmlspecialchars($cours['titre']); ?></h1>

        <section>
            <h2 class="text-2xl font-semibold">Description</h2>
            <p class="mt-4"><?= htmlspecialchars($cours['description']); ?></p>
        </section>

        <section class="mt-6">
            <h2 class="text-2xl font-semibold">Catégorie</h2>
            <p class="mt-4"><?= htmlspecialchars($cours['categorie_nom']); ?></p>
        </section>

        <section class="mt-6">
            <h2 class="text-2xl font-semibold">Tags</h2>
            <ul class="mt-4">
                <?php
                $tagsCours = explode(',', $cours['tags']); 
                foreach ($tagsCours as $tag) {
                    echo "<li>" . htmlspecialchars($tag) . "</li>";
                }
                ?>
            </ul>
        </section>

        <section class="mt-6">
            <a href="etudiantDashboard.php" class="text-blue-500">Retour aux Cours</a>
        </section>
    </div>
</body>
</html> -->
