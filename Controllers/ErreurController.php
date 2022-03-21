<?php

namespace Controllers;

class ErreurController {
    static public function print404() {
        require view('erreurs/404');
    }
    static public function print403() {
        require view('erreurs/403');
    }
    static public function print500() {
        require view('erreurs/500');
    }
}
