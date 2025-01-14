<?php

require_once 'Database.php';


$db = Database::getInstance();


$query = $db->prepare("SELECT * FROM cours");
$query->execute();


$cour = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($cour as $cours) {
    echo "Titre du cours: " . $cours['titre'] . "<br>";
}
?>