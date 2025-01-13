<?php 


    class Role
    {
        private int $id;
        private string $title;
        private string $description;
        private string $logo;


        // public function __construct()
        // {

        // }

        public function __construct($title, $description, $logo)
        {
            // $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->logo = $logo;
        }


        public function setId(int $id): void 
        {
            $this->id = $id;
        }
    
        public function setTtile(string $title) : void 
        {
            $this->title = $title;
        }
    
        public function setDescription(string $description) : void 
        {
            $this->description = $description;
        }
    
        public function setLogo(string $logo): void 
        {
            $this->logo = $logo;
        }
    
        public function getId(): int 
        {
            return $this->id;
        }
    
        public function getTitle() : string 
        {
            return $this->title;
        }
    
        public function getDescription(): string 
        {
            return $this->description;
        }
    
        public function getLogo(): string
        {
            return $this->logo;
        }


        public function __toString()
        {
            $id = $this->id ?? 0;
            $title = $this->title ?? "";
            $description = $this->description ?? "";
            $logo = $this->logo ?? "";
    
            return "(Role) => id : " . $id . 
            " , name : " . $title . 
            " , description : " . $description . 
            " , logo : " . $logo. " ";
        }

    }




















?>