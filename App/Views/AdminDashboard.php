<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">
        <div class="w-64 bg-blue-600 text-white p-6">
            <h1 class="text-2xl font-semibold">Youdemy</h1>
            <nav class="mt-8">
                <ul>
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Tags</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Categories</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Étudiants</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Enseignants</a></li>
                </ul>
            </nav>
        </div>

        <div class="flex-1 p-8">

            <header class="flex justify-between items-center bg-white p-4 shadow-md">
                <h2 class="text-xl font-bold">Dashboard</h2>
                <nav>
                    <a href="#" class="text-blue-600 hover:underline">Logout</a>
                </nav>
            </header>

            <div class="container mx-auto mt-8">

                <div class="mb-6">
                    <h3 class="text-lg font-medium mb-4">Liste des Tags</h3>
                    <table class="min-w-full bg-white border border-gray-200 rounded shadow-md">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nom du Tag</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($tags) && count($tags) > 0): ?>
                                <?php foreach ($tags as $tag): ?>
                                    <tr>
                                        <td class="py-2 px-4 border-b"><?= $tag['tag_name']; ?></td>
                                        <td class="py-2 px-4 border-b flex space-x-2">
                                            <button class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</button>
                                            <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center py-4">Aucun tag disponible.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Ajouter un Tag</button>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-medium mb-4">Liste des Catégories</h3>
                    <table class="min-w-full bg-white border border-gray-200 rounded shadow-md">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nom de la Catégorie</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($categories) && count($categories) > 0): ?>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td class="py-2 px-4 border-b"><?= $category['category_name']; ?></td>
                                        <td class="py-2 px-4 border-b flex space-x-2">
                                            <button class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</button>
                                            <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center py-4">Aucune catégorie disponible.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Ajouter une Catégorie</button>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-medium mb-4">Liste des Étudiants</h3>
                    <table class="min-w-full bg-white border border-gray-200 rounded shadow-md">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nom</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($students) && count($students) > 0): ?>
                                <?php foreach ($students as $student): ?>
                                    <tr>
                                        <td class="py-2 px-4 border-b"><?= $student['nom'] . ' ' . $student['prenom']; ?></td>
                                        <td class="py-2 px-4 border-b"><?= $student['email']; ?></td>
                                        <td class="py-2 px-4 border-b flex space-x-2">
                                            <button class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</button>
                                            <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center py-4">Aucun étudiant disponible.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="mb-6">
                    <h3 class="text-lg font-medium mb-4">Liste des Enseignants</h3>
                    <table class="min-w-full bg-white border border-gray-200 rounded shadow-md">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nom</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($teachers) && count($teachers) > 0): ?>
                                <?php foreach ($teachers as $teacher): ?>
                                    <tr>
                                        <td class="py-2 px-4 border-b"><?= $teacher['nom'] . ' ' . $teacher['prenom']; ?></td>
                                        <td class="py-2 px-4 border-b"><?= $teacher['email']; ?></td>
                                        <td class="py-2 px-4 border-b flex space-x-2">
                                            <button class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</button>
                                            <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center py-4">Aucun enseignant disponible.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

   
    <footer class="bg-blue-600 p-4 text-white text-center mt-8">
        <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
    </footer>

</body>

</html>
