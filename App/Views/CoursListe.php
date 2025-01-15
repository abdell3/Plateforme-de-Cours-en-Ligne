<?php

require_once __DIR__ . '/../include.php';

$courseService = new CoursService();

$courses = $courseService->getAllCourses();

if ($courses === false) {
    echo "<p>Aucun cours trouvé.</p>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

    <div class="container mx-auto p-8">

        <h1 class="text-3xl font-semibold mb-6 text-center">Liste des Cours</h1>

        <?php if (!empty($courses)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($courses as $course): ?>
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow">
                        <h2 class="text-xl font-semibold text-blue-600"><?php echo htmlspecialchars($course['titre']); ?></h2>
                        <p class="text-gray-700 mt-2"><?php echo htmlspecialchars($course['description']); ?></p>
                        <div class="mt-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700">En savoir plus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-red-600 mt-4">Aucun cours disponible pour le moment.</p>
        <?php endif; ?>

    </div>
    
</body>
</html>
