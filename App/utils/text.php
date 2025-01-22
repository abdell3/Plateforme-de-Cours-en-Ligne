<!-- <?php

require_once __DIR__ . '/../include.php'; 


// $db = Database::getInstance();


// $query = $db->prepare("SELECT * FROM cours");
// $query->execute();


// $cour = $query->fetchAll(PDO::FETCH_ASSOC);
// foreach ($cour as $cours) {
//     echo "Titre du cours: " . $cours['titre'] . "<br>";
// }
?> -->




<?php

?>
<form action="GeneralController.php?action=create" method="POST">
    <input type="hidden" name="table" value="cours">
    <input type="text" name="data[titre]" placeholder="Titre du Cours">
    <textarea name="data[description]" placeholder="Description du Cours"></textarea>
    <input type="text" name="data[enseignant_id]" placeholder="ID Enseignant">
    <input type="text" name="data[prix]" placeholder="Prix">
    <button type="submit">Créer le Cours</button>
</form>
