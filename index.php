<?php
require_once __DIR__ . '/functions.php';

spl_autoload_register('FQCNEtRequire');

use Exception;
use Controllers\HomeController;
use Controllers\ErreurController;
use Controllers\MoleculeController;

session_start();

try {

    if (empty($_GET['route'])) $route = 'home';
    else $route = $_GET['route'];

    switch ($route) {
        case 'home':
            HomeController::printHome();
            break;
        case 'liste':
            MoleculeController::liste();
            break;
        case 'details':
            MoleculeController::details();
            break;

        default:
            throw new Exception('', 404);
    }
} catch (PDOException $e) {
    ErreurController::print500();
} catch (Exception $e) {
    if ($e->getCode() == 404) ErreurController::print404();
}