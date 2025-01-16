<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Catégorie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Créer une Catégorie</h1>

        <form action="createCategory.php" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom de la Catégorie</label>
                <input type="text" id="name" name="data[name]" class="w-full px-4 py-2 border rounded-md" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md">Créer</button>
        </form>
    </div>

</body>
</html>
