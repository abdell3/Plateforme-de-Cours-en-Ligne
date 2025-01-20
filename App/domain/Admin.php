<?php 


include_once 'User.php';
include_once 'Role.php';

    class Admin extends User
    {
        private int $id;
        private array $cours = [];
        private array $etudiants = [];
        private array $enseignants = [];


        public function __construct($nom, $prenom, $phone, $email, $pass, Role $role)
        {
            parent :: __construct($nom, $prenom, $phone, $email, $pass,  $role);
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

        public function getEtudants(): array
        {
            return $this->etudiants;
        }
        public function setEtudiants(array $etudiants)
        {
            $this->etudiants = $etudiants;
        }


        public function getEnseignants(): array
        {
            return $this->enseignants;
        }
        public function setEnseignants(array $enseignants)
        {
            $this->enseignants = $enseignants;
        }

        public function __toString()
        {
            return parent::__toString() . 
            " , cours: [" . implode(",", $this->cours) . 
            "] , etudiants: [" . implode(",", $this->etudiants) .
            "] , enseignants: [" . implode(",", $this->enseignants) . "] . ";
        }
    }










?>