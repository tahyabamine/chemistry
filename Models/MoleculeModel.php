<?php

namespace Models;

use PDO;

class MoleculeModel
{
    static function retrieveALL()
    {
        $bdd = seConnecter();
        $requette = 'SELECT * FROM molecule';
        $stmt = $bdd->prepare($requette);
        $stmt->execute();
        return
            $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    static function retriveOne($id)
    {
        $bdd = seConnecter();
        $requette =
            'SELECT molecule.*, atome_molecule.id_atome, atome_molecule.qtte_atome,atome.nom AS atome_nom FROM molecule JOIN atome_molecule ON atome_molecule.id_molecule= molecule.id JOIN atome ON atome_molecule.id_atome= atome.id
            WHERE molecule.id = :id';
        $stmt = $bdd->prepare($requette);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return
            $stmt->fetch(PDO::FETCH_OBJ);
    }
    static function calcul_masse($id)
    {
        $bdd = seConnecter();
        $requette =
            'SELECT SUM(atome.masse_atomique* atome_molecule.qtte_atome) AS masse_moleculaire, molecule.nom From molecule JOIN atome_molecule ON molecule.id=atome_molecule.id_molecule Join atome ON atome.id=atome_molecule.id_atome where molecule.id=:id';
        $stmt = $bdd->prepare($requette);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return
            $stmt->fetch(PDO::FETCH_OBJ);
    }
    static function retriveALLatome($id)
    {
        $bdd = seConnecter();
        $requette =
            'SELECT molecule.*, atome_molecule.id_atome, atome_molecule.qtte_atome,atome.nom AS atome_nom FROM molecule JOIN atome_molecule ON atome_molecule.id_molecule= molecule.id JOIN atome ON atome_molecule.id_atome= atome.id
            WHERE molecule.id = :id';
        $stmt = $bdd->prepare($requette);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return
            $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    static public function createMolecule(string $nom, string $formule)
    {
        $nom = htmlspecialchars($nom);
        $formule = htmlspecialchars($formule);
        $bdd = seConnecter();

        $requete = 'INSERT INTO molecule VALUE (NULL, :nom, :formule)';

        $stmt = $bdd->prepare($requete);


        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':formule', $formule);



        $stmt->execute();
    }
    static public function updateMolecule(int $id, int $atome, int $quantite)
    {

        $bdd = seConnecter();

        $requete =
            'INSERT INTO atome_molecule VALUE (NULL, :atome_id , :id_molecule, :qtte_atome)';

        $stmt = $bdd->prepare($requete);


        $stmt->bindParam(':atome_id', $atome);
        $stmt->bindParam(':qtte_atome', $quantite);
        $stmt->bindParam(':id_molecule', $id);

        $stmt->execute();
    }
    static function retrieveALLAtomes()
    {
        $bdd = seConnecter();
        $requette = 'SELECT * FROM atome';
        $stmt = $bdd->prepare($requette);
        $stmt->execute();
        return
            $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    static public function deleteMolecule(int $id)
    {
        $requete = 'DELETE FROM molecule WHERE molecule.id = :id';

        $bdd = seConnecter();

        $stmt = $bdd->prepare($requete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}