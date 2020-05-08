<?php

require_once 'framework/Configuration.php';
require_once 'framework/Controleur.php';

class ControleurApropos extends Controleur {

    public function index() {
        $this->genererVue();
    }
    
}
