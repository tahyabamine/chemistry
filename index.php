<?php
require_once __DIR__ . '/functions.php';

spl_autoload_register('FQCNEtRequire');

use Controllers\HomeController;
use Controllers\ErreurController;

session_start();

try {

    if (empty($_GET['route'])) $route = 'home';
    else $route = $_GET['route'];

    switch ($route) {
        case 'home':
            HomeController::printHome();
            break;

        default:
            throw new Exception('', 404);
    }
} catch (PDOException $e) {
    ErreurController::print500();
} catch (Exception $e) {
    if ($e->getCode() == 404) ErreurController::print404();
}