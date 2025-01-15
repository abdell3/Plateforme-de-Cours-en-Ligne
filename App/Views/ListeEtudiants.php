<?php
require_once __DIR__ . '/../include.php';

$etudiantService = new EtudiantService();
$etudiants = $etudiantService->getAllEtudiants();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-4xl mx-auto p-8 mt-10 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Liste des Étudiants</h1>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nom</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Prénom</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etudiants as $etudiant): ?>
                    <tr class="border-t border-gray-200">
                        <td class="px-4 py-2 text-sm text-gray-700"><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?php echo htmlspecialchars($etudiant['prenom']); ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?php echo htmlspecialchars($etudiant['email']); ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700">
                            <a href="updateEtudiantForm.php?id=<?php echo $etudiant['id']; ?>" class="text-blue-600 hover:text-blue-800">Modifier</a> |
                            <a href="deleteEtudiant.php?id=<?php echo $etudiant['id']; ?>" class="text-red-600 hover:text-red-800">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
