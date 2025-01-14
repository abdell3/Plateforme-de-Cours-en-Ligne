<?php

class User 
{
    //attributes
    private int $id;
    private string $nom; 
    private string $prenom;
    private string $phone;
    private string $email;
    private string $motDePasse;
    private Role $role;
    private int $role_id;
    private string $image;
    private $dateInscription;




    // public Gender $gender; 
    
    // public function __construct() 
    // {
    // }
    //constructer with paraùeters 
    
    public function __construct($nom, $prenom, $phone, $email,$pass, Role $role)
    {
        // $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->phone = $phone;
        $this->email = $email;
        $this->motDePasse = $pass;
        $this->role = $role;
        // $this->dateInscription = $inscrit; 
    }
    
    //getters and setters

    public function getId():int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }



    public function getNom(): string{
        return $this->nom;
    }
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
    
    
    public function getPrenom (): string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }


    public function getPhone(): string
    {
        return $this->phone;
    }
    public function setPhone (string $phone): void
    {
        $this->phone = $phone;
    }


    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }



    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }
    public function setMotDePasse(string $motDePasse): void
    {
        $this->motDePasse = $motDePasse;
    }


    public function getRole(): Role
    {
        return $this->role;
    }
    public function setRole(Role $role): void
    {
        $this->role = $role;
    }


    public function getRoleId(): int
    {
        return $this->role_id;
    }
    public function setRoleID(int $role_id)
    {
        $this->role_id = $role_id;
    }



    public function getImage(): string
    {
        return $this->image;
    }
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
    public function getDateInscription()
    {
        return $this->dateInscription;
    }
    

    public function __toString() {
        return "Id : " . $this->id.  
         " , Nom: " .$this->nom.  
         " , Prenom: " .$this->prenom.     
         " , phone : " .$this->phone . 
         " , email : " . $this->email  . 
         " , mot de passe : " . $this->motDePasse . 
         " photo : " . $this->image . 
         " , Role : " . $this->role . 
         " , Role_ID : " . $this->role_id . "" ;
    }

     

}
?>