<?php
require_once __DIR__ . '/../include.php';  

class ErrorHandler {

    public static function handleError($exception) {
        
        echo "Erreur: " . $exception->getMessage();
        
    }
}
