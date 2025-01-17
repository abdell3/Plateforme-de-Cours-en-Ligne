<?php 


include_once 'Detail.php';


    class Categorie extends Detail
    {
      
        



        public function __construct(string $nom, string $smallDescri, string $logo)
        {
           parent::__construct($nom, $smallDescri, $logo);
        }


        // public function getId(): int
        // {
        //     return $this->id;
        // }
        // public function setId(int $id)
        // {
        //     $this->id = $id;
        // }


        // public function getCours(): array
        // {
        //     return $this->cours;
        // }

        // public function setCours(array $cours)
        // {
        //     $this->cours = $cours;
        // }

        // public function __toString() {
        //     return parent :: __toString() ;
             
        // }

    }











?>