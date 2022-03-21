<?php



use PDO;
use Config;


function redirection($route)
{
    header('Location: ' . url($route));
    die;
}
function cemichalFormula($molecule)
{

    return preg_replace('/(\d+)/', '<sub>$1</sub>', $molecule);
}
function url($route)
{
    return 'index.php?route=' . $route;
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die;
}

function view($vue)
{
    return __DIR__ . '/views/' . $vue . '.php';
}

/**
 * 
 * Fait le require adapté par rapport à un FQCN
 * (par exemple require __DIR__ . '/Controllers/HomeController.php')
 * 
 * @param string $fqcn Par exemple Controllers\HomeController
 */
function FQCNEtRequire($fqcn)
{
    require_once __DIR__ . '/' . str_replace('\\', '/', $fqcn) . '.php';
}

function seConnecter()
{
    return new PDO('mysql:host=' . Config::DATABASE_HOST . ';dbname=' . Config::DATABASE_NAME, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
}