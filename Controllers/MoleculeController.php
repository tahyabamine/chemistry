<?php

namespace Controllers;

use Models\MoleculeModel;

class MoleculeController
{
    static public function liste()
    {

        $molecules = MoleculeModel::retrieveALL();
        require_once view('liste_molecule');
    }
    static function details()
    {
        if (empty($_GET['id'])) ErreurController::print404();

        $molecule = MoleculeModel::retriveOne($_GET['id']);
        $atomes = MoleculeModel::retriveALLatome($_GET['id']);

        if (empty($molecule))  ErreurController::print404();
        if (empty($atomes))  ErreurController::print404();

        require_once view('details_molecule');
    }
}