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
        $items = $this->item->getAllItems();
        $this->genererVue(['items' => $items]);
    }

// Affiche les détails sur un item
    public function lire() {
        $idItem = $this->requete->getParametreId("id");
        $item = $this->item->getItem($idItem);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $items = $this->item->getItems($idItem);
        $this->genererVue(['item' => $item, 'erreur' => $erreur]);
    }

}