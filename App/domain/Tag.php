<?php 


include_once 'Detail.php';


    class Tag extends Detail
    {
        private int $id;


        public function __construct(string $nom, string $smallDescri, string $logo)
        {
            parent :: __construct($nom, $smallDescri, $logo);
        }


        public function getId(): int
        {
            return $this->id;
        }
        public function setId(int $id)
        {
            $this->id = $id;
        }



        public function __toString() {
            return parent :: __toString () ;
        }

    }











?>