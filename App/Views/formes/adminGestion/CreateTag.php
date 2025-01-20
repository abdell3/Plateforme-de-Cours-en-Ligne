<?php

require_once __DIR__ . '/../Service/AdminService.php';
$adminService = new AdminService();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tags = array_map('trim', explode(',', $_POST['tags']));

    foreach ($tags as $tagName) {
        if (empty($tagName)) {
            $errors[] = "Un ou plusieurs noms de tags sont vides.";
            continue;
        }

        try {
            $adminService->create('tags',['nom' => $tagName]);
        } catch (Exception $e) {
            $errors[] = "Erreur lors de la création du tag '$tagName': " . $e->getMessage();
        }
    }

    if (empty($errors)) {
        header('Location: ../AdminDashboard.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter des Tags</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold">Ajouter des Tags</h1>
        <form method="POST" class="mt-6">
            <label for="tags" class="block text-lg">Noms des Tags (séparés par des virgules)</label>
            <input type="text" name="tags" class="mt-2 p-2 border w-full" required>
            <button type="submit" class="mt-4 bg-blue-500 text-white p-2">Ajouter</button>
        </form>

        <?php if (!empty($errors)): ?>
            <div class="mt-4 p-4 bg-red-200 text-red-800 rounded">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>