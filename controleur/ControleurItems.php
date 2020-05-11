<?php

require_once 'framework/Controleur.php';
require_once 'modele/Item.php';

class ControleurItems extends Controleur{

    private $item;

    public function __construct() {
        $this->item = new Item();
    }
    
// N'est pas content si non utilisé
    public function index() {
        $items = $this->item->getItems();
        $this->genererVue(['items' => $items]);
    }

}