<?php
require_once dirname(__DIR__, 3) . '/controller/EnseignantController.php';

$controller = new EnseignantController();
$categories = $controller->getAllCategories();
$tags = $controller->getAllTags();

  
$enseignantId = $_SESSION['user_id']; 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un cours</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Créer un nouveau cours</h1>

    <form method="POST" action="TraitementCreerCours.php" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label class="block text-gray-700">Titre du cours</label>
            <input type="text" name="titre" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" required class="w-full p-2 border rounded"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Contenu</label>
            <textarea name="contenu" required class="w-full p-2 border rounded"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Image</label>
            <input type="file" name="image" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Catégorie</label>
            <select name="categorie_id" required class="w-full p-2 border rounded">
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?= $categorie['id']; ?>"><?= htmlspecialchars($categorie['nom']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tags</label>
            <div class="flex flex-wrap">
                <?php foreach ($tags as $tag): ?>
                    <label class="mr-4 mb-2">
                        <input type="checkbox" name="tags[]" value="<?= $tag['id']; ?>">
                        <?= htmlspecialchars($tag['nom']); ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <input type="hidden" name="enseignant_id" value="<?= $enseignantId; ?>">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer</button>
    </form>
</div>
</body>
</html>
