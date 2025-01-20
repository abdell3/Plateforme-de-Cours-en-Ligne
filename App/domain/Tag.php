<?php 


include_once 'Detail.php';


    class Tag extends Detail
    {
        public function __construct(string $nom, string $smallDescri, string $logo)
        {
            parent :: __construct($nom, $smallDescri, $logo);
        }


        // public function getId(): int
        // {
        //     return $this->id;
        // }
        // public function setId(int $id)
        // {
        //     $this->id = $id;
        // }

        // public function getDetailId(): int
        // {
        //     return $this->detail_id;
        // }
        // public function setDetailId(int $detailId)
        // {
        //     $this->detail_id= $detailId;
        // }
    }
?>