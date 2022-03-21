<?php

namespace Helpers;

use PDO;
use Config;

class Helper
{
    static public function redirection($route)
    {
        header('Location: ' . static::url($route));
        die;
    }

    static public function url($route)
    {
        return 'index.php?route=' . $route;
    }

    static public function dd($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die;
    }

    static public function view($vue)
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
    static public function FQCNEtRequire($fqcn)
    {
        require_once __DIR__ . '/' . str_replace('\\', '/', $fqcn) . '.php';
    }

    static public function seConnecter()
    {
        return new PDO('mysql:host=' . Config::DATABASE_HOST . ';dbname=' . Config::DATABASE_NAME, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
    }
}