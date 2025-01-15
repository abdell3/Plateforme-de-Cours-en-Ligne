<?php


require_once __DIR__ . '/../include.php';

class CreateService
{
    public function createEtudiant($etudiant)
    {
        
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->addEtudiant($etudiant->getNom(), $etudiant->getPrenom(), $etudiant->getEmail(), 
                                    $etudiant->getMotDePasse(), $etudiant->getRoleId(), $etudiant->getPhone(), 
                                    $etudiant->getImage());
    }

    public function createEnseignant($enseignant)
    {
       
        $enseignantRepo = new EnseignantRepository();
        $enseignantRepo->addEnseignant($enseignant->getNom(), $enseignant->getPrenom(), $enseignant->getEmail(), 
                                        $enseignant->getMotDePasse(), $enseignant->getRoleId(), $enseignant->getPhone(), 
                                        $enseignant->getImage());
    }

    public function createCour($cour)
    {
        $courRepo = new CoursRepository();
        $courRepo->addCours($cour->getTitre(), $cour->getDescription(), $cour->getEnseignantId());
    }
}

