<?php
require_once __DIR__ . '/../Service/AdminService.php';
$adminService = new AdminService();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    if (empty($nom) || empty($prenom) || empty($email)) {
        $errors[] = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email n'est pas valide.";
    }
    if (empty($errors)) {
        try {
            $adminService->create('etudiants',['nom' => $nom, 'prenom' => $prenom, 'email' => $email]);
            header('Location: ../AdminDashboard.php');
            exit;
        } catch (Exception $e) {
            $errors[] = "Erreur lors de la création de l'étudiant : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold">Ajouter un Étudiant</h1>
        <form method="POST" class="mt-6">
            <label for="nom" class="block text-lg">Nom</label>
            <input type="text" name="nom" class="mt-2 p-2 border w-full" required>

            <label for="prenom" class="block text-lg">Prénom</label>
            <input type="text" name="prenom" class="mt-2 p-2 border w-full" required>

            <label for="email" class="block text-lg">Email</label>
            <input type="email" name="email" class="mt-2 p-2 border w-full" required>

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
