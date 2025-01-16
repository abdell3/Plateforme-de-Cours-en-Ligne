<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Créer un Cours</h1>

        <form action="createCourse.php" method="POST">
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Titre du Cours</label>
                <input type="text" id="title" name="data[title]" class="w-full px-4 py-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="data[description]" class="w-full px-4 py-2 border rounded-md" required></textarea>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Catégorie</label>
                <select id="category_id" name="data[category_id]" class="w-full px-4 py-2 border rounded-md">
                    <?php
                    
                    $categories = (new GeneralService())->readAll('category');
                    foreach ($categories as $category) {
                        echo "<option value='{$category['id']}'>{$category['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="tag_id" class="block text-gray-700">Tag</label>
                <select id="tag_id" name="data[tag_id]" class="w-full px-4 py-2 border rounded-md">
                    <?php
                    
                    $tags = (new GeneralService())->readAll('tag');
                    foreach ($tags as $tag) {
                        echo "<option value='{$tag['id']}'>{$tag['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md">Créer</button>
        </form>
    </div>

</body>
</html>
