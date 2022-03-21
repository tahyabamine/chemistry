<?php

namespace Controllers;

use Models\AtomeModel;
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
        $atomes = AtomeModel::retriveALLatome($_GET['id']);
        $molecule_masse = MoleculeModel::calcul_masse($_GET['id']);


        if (empty($molecule))  ErreurController::print404();
        if (empty($atomes))  ErreurController::print404();

        require_once view('details_molecule');
    }
    static function create()
    {
        if (!empty($_POST)) {
            if (
                empty($_SESSION['token'])
                || empty($_POST['csrf_token'])
                || $_SESSION['token'] != $_POST['csrf_token']
            ) die('Erreur de token CSRF');

            if (empty($_POST['nom'])) $errors[] = 'Le nom est requis.';
            if (empty($_POST['formule'])) $errors[] = 'La formule est requise.';
            if (!validateformule($_POST['formule'])) $errors[] = 'La formule n\'est pas correcte.';


            if (empty($errors)) {

                MoleculeModel::createMolecule($_POST['nom'], ucfirst($_POST['formule']));

                redirection('liste');
            }
        }



        require_once view('create_molecule');
    }
    static function update()
    {
        if (!empty($_POST)) {
            if (
                empty($_SESSION['token'])
                || empty($_POST['csrf_token'])
                || $_SESSION['token'] != $_POST['csrf_token']
            ) die('Erreur de token CSRF');
            if (empty($_GET['id'])) ErreurController::print404();

            if (empty($_POST['atome'])) $errors[] = 'L\' atome est requise.';
            if (empty($_POST['quantite'])) $errors[] = 'La quantite  est requise.';
            if (!is_numeric($_POST['atome'])) $errors[] = 'L\' element saisi  ne corresspont pas a un atome .';
            if (!is_numeric($_POST['quantite']) && is_int($_POST['quantite']) && ($_POST['quantite'] > 0)) $errors[] = 'La quantite doit etre un nombre entier superiere a 0 est requise.';

            if (empty($errors)) {

                MoleculeModel::updateMolecule($_GET['id'], $_POST['atome'], $_POST['quantite']);

                redirection('liste');
            }
        }

        $atomes = AtomeModel::retrieveALLAtomes();

        require_once view('update_molecule');
    }
    static public  function delete()
    {
        if (empty($_GET['id'])) ErreurController::print404();

        AtomeModel::DeleteAtomes($_GET['id']);
        MoleculeModel::deleteMolecule($_GET['id']);


        redirection('liste');
    }
}