<?php
require_once __DIR__ . '/../Service/AdminService.php';
$adminService = new AdminService();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);

    if (empty($nom)) {
        $errors[] = 'Le nom est requis.';
    }
    if (empty($prenom)) {
        $errors[] = 'Le prénom est requis.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Une adresse email valide est requise.';
    }

    if (empty($errors)) {
        try {
            $adminService->create('enseignats', [
                'nom' => htmlspecialchars($nom),
                'prenom' => htmlspecialchars($prenom),
                'email' => htmlspecialchars($email)
            ]);
            header('Location: ../AdminDashboard.php?success=teacher_created');
            exit();
        } catch (Exception $e) {
            $errors[] = 'Erreur lors de la création de l\'enseignant : ' . $e->getMessage();
        }
    }
}
?>
 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Enseignant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold">Ajouter un Enseignant</h1>
        <?php if ($errors): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" class="mt-6">
            <label for="nom" class="block text-lg">Nom</label>
            <input type="text" name="nom" class="mt-2 p-2 border w-full" required value="<?= isset($nom) ? htmlspecialchars($nom) : '' ?>">
            <label for="prenom" class="block text-lg">Prénom</label>
            <input type="text" name="prenom" class="mt-2 p-2 border w-full" required value="<?= isset($prenom) ? htmlspecialchars($prenom) : '' ?>">
            <label for="email" class="block text-lg">Email</label>
            <input type="email" name="email" class="mt-2 p-2 border w-full" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
            <button type="submit" class="mt-4 bg-blue-500 text-white p-2">Ajouter</button>
        </form>
    </div>
</body>
</html>
