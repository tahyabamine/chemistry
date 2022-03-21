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
}