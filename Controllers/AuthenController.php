<?php

namespace Controllers;

class AuthenController
{
    static public function connexion()
    {

        $_SESSION['pseudo'] = 'tabamine';
        $_SESSION['id'] = 1;
        $_SESSION['token'] = hash('sha256', random_bytes(32));


        redirection('home');
    }
    static public function deconnexion()
    {

        session_destroy();



        redirection('home');
    }
}