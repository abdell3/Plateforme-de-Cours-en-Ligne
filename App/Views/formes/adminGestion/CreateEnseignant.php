<?php


require_once __DIR__ . '/../Service/AdminService.php';
$adminService = new AdminService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email']
    ];
    $adminService->createTeacher($data);
    header('Location: ../AdminDashboard.php');
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
        <form method="POST" class="mt-6">
            <label for="nom" class="block text-lg">Nom</label>
            <input type="text" name="nom" class="mt-2 p-2 border w-full" required>
            <label for="prenom" class="block text-lg">Prénom</label>
            <input type="text" name="prenom" class="mt-2 p-2 border w-full" required>
            <label for="email" class="block text-lg">Email</label>
            <input type="email" name="email" class="mt-2 p-2 border w-full" required>
            <button type="submit" class="mt-4 bg-blue-500 text-white p-2">Ajouter</button>
        </form>
    </div>
</body>
</html>
