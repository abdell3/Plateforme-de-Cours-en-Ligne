<?php


require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/domain/Etudient.php';
require_once __DIR__ . '/domain/Enseignant.php';
require_once __DIR__ . '/domain/Cour.php';
require_once __DIR__ . '/domain/Admin.php';
require_once __DIR__ . '/domain/Categorie.php';
require_once __DIR__ . '/domain/Detail.php';
require_once __DIR__ . '/domain/Role.php';
require_once __DIR__ . '/domain/Tag.php';
require_once __DIR__ . '/domain/User.php';
require_once __DIR__ . '/controller/CreateController.php';
require_once __DIR__ . '/controller/DeleteController.php';
require_once __DIR__ . '/repository/AdminRepository.php';
require_once __DIR__ . '/repository/CoursRepository.php';
require_once __DIR__ . '/repository/EnseignantRepository.php';
require_once __DIR__ . '/repository/EtudiantRepository.php';
require_once __DIR__ . '/service/AdminService.php';
require_once __DIR__ . '/service/CoursService.php';
require_once __DIR__ . '/service/CreateService.php';
require_once __DIR__ . '/service/EnseignantService.php';
require_once __DIR__ . '/service/EtudiantService.php';
require_once __DIR__ . '/utlis/ErreurHandler.php';




?>