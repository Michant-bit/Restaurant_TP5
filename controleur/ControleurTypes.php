<?php

require_once 'framework/Controleur.php';
require_once 'modele/Type.php';

class ControleurTypes extends Controleur {

    private $type;

    public function __construct() {
        $this->type = new Type();
    }

// recherche et retourne les types pour l'autocomplete
    public function quelsTypes($term) {
        echo $this->type->searchType($term);
    }

}
