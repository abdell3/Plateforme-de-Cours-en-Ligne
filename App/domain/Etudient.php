<?php 

include_once 'User.php';
include_once 'Role.php';


    class Etudiant extends User
    {
        private int $id;
        private $dateInscription;
        private array $cours = [];

        // public function __construct()
        // {

        // }

        public function __construct(string $nom, string $prenom, string $phone, string $email, string $pass, Role $role)
        {
            parent :: __construct($nom, $prenom, $phone, $email, $pass, $role);
            // $this->id = $id;
        }

        public function getId(): int
        {
            return $this->id;
        }
        public function setId(int $id): void
        {
            $this->id = $id;
        }


        public function getCours(): array
        {
            return $this->cours;
        }
        public function setCours(array $cours)
        {
            $this->cours = $cours;
        }
        public function getDateInscription()
    {
        return $this->dateInscription;
    }

        public function __toString()
        {
            return parent::__toString() . 
            " , cours: " . implode(",", $this->cours) . ".";
        }
    }
?>