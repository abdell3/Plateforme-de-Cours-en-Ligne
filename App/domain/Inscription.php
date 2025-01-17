<?php 

    class Inscription 
    {
        private int $id;
        private Cour $cour;
        private User $etudiants;



        public function __construct()
        {
        }


        public function SetUser( User $Etudiants){
            $this->Etudiants = $Etudiants ;
            
        }
        public function SetCour(Cour $cour){
            $this->cour = $cour ;
        }
        public function SetId($id){
            $this->id = $id ;
        }
        public function getId(){
            return $this->id ;
        }
        public function getUser(){
            return $this->etudiants;
        }
        public function getCour(){
            return $this->cour ;
        }

    }


?>