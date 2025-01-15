<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-md mt-10">
        <h1 class="text-3xl font-bold text-center mb-6">Création</h1>
        
       
        <form action="index.php?action=create" method="POST" class="space-y-6">
            
            
            <div class="flex justify-between items-center">
                <label for="type" class="text-lg font-medium">Type d'entité :</label>
                <select name="type" id="type" class="border border-gray-300 rounded-md p-2 w-2/3">
                    <option value="etudiant">Etudiant</option>
                    <option value="enseignant">Enseignant</option>
                    <option value="cour">Cours</option>
                </select>
            </div>

            
            <div class="space-y-4">
                <div>
                    <label for="nom" class="block text-lg font-medium">Nom :</label>
                    <input type="text" id="nom" name="nom" class="w-full p-3 border border-gray-300 rounded-md" required placeholder="Entrez votre nom">
                </div>

                <div>
                    <label for="prenom" class="block text-lg font-medium">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" class="w-full p-3 border border-gray-300 rounded-md" required placeholder="Entrez votre prénom">
                </div>

                <div>
                    <label for="email" class="block text-lg font-medium">Email :</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-md" required placeholder="Entrez votre email">
                </div>

                <div>
                    <label for="motDePasse" class="block text-lg font-medium">Mot de passe :</label>
                    <input type="password" id="motDePasse" name="motDePasse" class="w-full p-3 border border-gray-300 rounded-md" required placeholder="Entrez votre mot de passe">
                </div>
            </div>

          
            <div id="etudiantFields" class="hidden space-y-4">
                <div>
                    <label for="niveau" class="block text-lg font-medium">Niveau d'étude :</label>
                    <input type="text" id="niveau" name="niveau" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Exemple: Licence, Master...">
                </div>
            </div>

            <div id="enseignantFields" class="hidden space-y-4">
                <div>
                    <label for="matiere" class="block text-lg font-medium">Matière enseignée :</label>
                    <input type="text" id="matiere" name="matiere" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Exemple: Mathématiques, Informatique...">
                </div>
            </div>

            <div id="courFields" class="hidden space-y-4">
                <div>
                    <label for="titre" class="block text-lg font-medium">Titre du cours :</label>
                    <input type="text" id="titre" name="titre" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Exemple: Introduction à PHP">
                </div>

                <div>
                    <label for="description" class="block text-lg font-medium">Description du cours :</label>
                    <textarea id="description" name="description" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Décrivez brièvement le cours"></textarea>
                </div>
            </div>

            
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 w-1/2">Créer</button>
            </div>
        </form>
    </div>

   
    <script>
        const typeSelect = document.getElementById('type');
        const etudiantFields = document.getElementById('etudiantFields');
        const enseignantFields = document.getElementById('enseignantFields');
        const courFields = document.getElementById('courFields');

        typeSelect.addEventListener('change', function () {
            const type = this.value;

          
            etudiantFields.classList.add('hidden');
            enseignantFields.classList.add('hidden');
            courFields.classList.add('hidden');

        
            if (type === 'etudiant') {
                etudiantFields.classList.remove('hidden');
            } else if (type === 'enseignant') {
                enseignantFields.classList.remove('hidden');
            } else if (type === 'cour') {
                courFields.classList.remove('hidden');
            }
        });
    </script>
</body>
</html> -->



<form method="POST" action="createEtudiant.php">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" required><br>

    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="motDePasse">Mot de passe:</label>
    <input type="password" name="motDePasse" required><br>

    <label for="role_id">Rôle:</label>
    <input type="number" name="role_id" required><br>

    <label for="phone">Numéro de téléphone:</label>
    <input type="text" name="phone"><br>

    <label for="image">Image:</label>
    <input type="text" name="image"><br>

    <input type="hidden" name="type" value="etudiant"> 

    <button type="submit">Ajouter l'étudiant</button>
</form>
