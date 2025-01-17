<?php 
     

    class Cour
    {
        private int $id;
        private string $titre;
        private string $description;
        private string $contenue;
        private Enseignant $enseignant;
        private Categorie $categorie;
        private array $inscription = [];
        private array $tags = []; //tableau pivot
        private string $photo;



        // public function __construct()
        // {

        // }
        public function __construct(string $titre, Enseignant $enseignant, Categorie $categorie, array $etudiants, array $tags, string $photo, string $description, string $contenue)
        {
            $this->contenue = $contenue;
            $this->titre = $titre;
            $this->description = $description;
            $this->enseignant = $enseignant;
            $this->categorie = $categorie;
            $this->etudiants = $etudiants;
            $this->tags = $tags;
            $this->photo = $photo;
            $this->description = $description;
        }


        public function getId(): int
        {
            return $this->id;
        }
        public function setId($id): void
        {
            $this->id = $id;
        }


        public function getTitre(): string
        {
            return $this->titre;
        } 
        public function setTitre($titre): void
        {
            $this->titre = $titre;
        }


        public function getDescription():string{
            return $this->description;
        }
        public function setDescription($description): void
        {
            $this->description = $description;
        }


        public function getEnseignant(): Enseignant
        {
            return $this->enseignant;
        }
        public function setEnseignant(Enseignant $enseignant): void
        {
            $this->enseignant = $enseignant;
        }


        public function getCategorie(): Categorie
        {
            return $this->categorie;
        }
        public function setCategorie(Categorie $categorie): void
        {
            $this->categorie = $categorie;
        }



        public function getContenue()
        {
            return $this->contenue;
        }
        public function setContenue($contenue): void
        {
            $this->contenue = $contenue; 
        }



        public function getTags(): array
        {
            return $this->tags;
        }
        public function setTags(array $tags): void
        {
            $this->tags = $tags; 
        }



        public function getPhoto(): string{
            return $this->photo;
        }
        public function setPhoto($photo): void
        {
            $this->photo = $photo;
        }



        public function __toString()
    {
        return "(Cour) => id : " .$this->id. 
        " , titre : " .$this->titre. 
        " , description  : " .$this->description. 
        " , Photo : " .$this->photo. 
        " , tags: " . implode(" , ", $this->tags) . 
        " , categorie: " .$this->categorie. 
        " , enseignant : " .$this->enseignant . 
        " , Contenue : " .$this->contenue .".";
    }






    }























?>