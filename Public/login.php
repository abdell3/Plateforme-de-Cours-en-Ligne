<?php
require_once dirname(__DIR__, 1) . '/App/utils/Sessions.php';
require_once dirname(__DIR__, 1) . '/App/utils/AuthManager.php';

Sessions::start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST['password']);die();
    $email = $_POST['email'];
    $password = $_POST['password'];
    
   
    $auth = new AuthManager();
    $user = $auth->login($email, $password);
    
    if ($user) {
        $_SESSION['user'] = $user; 
        // var_dump($_SESSION['user']);die();
        switch ($user['role_id']) {
            case 1: 
                header("location: /Plateforme-de-Cours-en-Ligne/Views/etudiant/etudiantDashboard.php");
                break;
            case 2: 
                header("location: /Plateforme-de-Cours-en-Ligne/App/Views/EnseignantDashboard.php");
                break;
            case 3:
                header("location: /Plateforme-de-Cours-en-Ligne/Views/admin/adminDashboard.php");
                break;
            default:
                echo "Rôle non reconnu.";
        }
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Connexion</h1>
        
        <?php if ($error): ?>
            <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded-lg">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    class="w-full p-3 mt-1 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe :</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="w-full p-3 mt-1 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            <button 
                type="submit" 
                class="w-full py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Se connecter
            </button>
        </form>
    </div>
</body>
</html>
