<?php

namespace Controllers;

class HomeController {
    static public function printHome() {
        require view('home');
    }
}
