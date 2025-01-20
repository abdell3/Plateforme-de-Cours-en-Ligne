<?php 

    class Detail
    {
        private int $id;
        private string $nom;
        private string $smallDescription;
        private string $logo;

        public function __construct(string $nom, string $smallDescri, string $logo)
        {
            $this->nom = $nom;
            $this->smallDescription = $smallDescri;
            $this->logo = $logo;
        }


        public function getId(): int
        {
            return $this->id;
        }
        public function setId(int $id)
        {
            $this->id = $id;
        }

        public function getNom(): string
        {
            return $this->nom;
        }
        public function setNom(string $nom)
        {
            $this->nom = $nom;
        }

        public function getSmallDescription(): string
        {
            return $this->smallDescription;
        }
        public function setSmallDescription(string $smallDescription)
        {
            $this->smallDescription = $smallDescription;
        }


        public function getLogo(): string
        {
            return $this->logo;
        }
        public function setLogo(string $logo)
        {
            $this->logo = $logo;
        }

        public function __toString() {
            return "Id : " . $this->id.  
             " , Nom: " .$this->nom.     
             " , description : " .$this->smallDescription .  
             " logo : " . $this->logo . " . ";
        }
    }
?>