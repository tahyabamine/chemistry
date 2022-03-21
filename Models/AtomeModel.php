<?php

namespace Models;

use PDO;

class AtomeModel
{
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
    static function retrieveALLAtomes()
    {
        $bdd = seConnecter();
        $requette = 'SELECT * FROM atome';
        $stmt = $bdd->prepare($requette);
        $stmt->execute();
        return
            $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    static public function DeleteAtomes($id)
    {
        $requete = 'DELETE FROM atome_molecule WHERE id_molecule = :id';

        $bdd = seConnecter();

        $stmt = $bdd->prepare($requete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    static function periodicTable()
    {
        $bdd = seConnecter();
        $requette = 'SELECT symbole, info_groupe, numero FROM `atome`  order by numero ';

        $stmt = $bdd->prepare($requette);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}