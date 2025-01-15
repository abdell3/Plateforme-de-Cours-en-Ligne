
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-md mt-10">
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Créer un Nouveau Étudiant</h1>
        
        <form action="/path/to/controller/createEtudiant" method="POST">
            
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom :</label>
                <input type="text" id="nom" name="nom" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

             
            <div class="mb-4">
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label for="motDePasse" class="block text-sm font-medium text-gray-700">Mot de passe :</label>
                <input type="password" id="motDePasse" name="motDePasse" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Rôle :</label>
                <select id="role_id" name="role_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="1">Étudiant</option>
                    <option value="2">Enseignant</option>
                </select>
            </div>

            
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone :</label>
                <input type="tel" id="phone" name="phone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image :</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4 text-center">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Créer l'Étudiant</button>
            </div>
        </form>
    </div>

</body>
</html>
