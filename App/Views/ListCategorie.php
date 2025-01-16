<!-- Views/listCategories.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-4xl mx-auto p-8 mt-10 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Liste des Catégories</h1>
        
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-700">Ajouter une nouvelle Catégorie</h2>
            <form action="AdminController.php?action=createCategory" method="POST">
                <div class="mt-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom de la Catégorie</label>
                    <input type="text" name="data[name]" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <button type="submit" class="mt-4 w-full py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Ajouter Catégorie</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-700">Nom</th>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2 text-sm text-gray-700"><?php echo htmlspecialchars($category['name']); ?></td>
                            <td class="px-4 py-2 text-sm text-gray-700">
                                <a href="AdminController.php?action=deleteCategory&id=<?php echo $category['id']; ?>" class="text-red-600 hover:text-red-800">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
