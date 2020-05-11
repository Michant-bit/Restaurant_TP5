<?php

require_once 'framework/Controleur.php';
require_once 'modele/Menu.php';
require_once 'modele/Item.php';

class ControleurMenus extends Controleur {

    private $menu;
    private $item;

    public function __construct() {
        $this->menu = new Menu();
        $this->item = new Item();
    }

// Affiche la liste de tous les menus
    public function index() {
        $menus = $this->menu->getMenus();
        $this->genererVue(['menus' => $menus]);
    }

// Affiche les détails sur un menu
    public function lire() {
        $idMenu = $this->requete->getParametreId("id");
        $menu = $this->menu->getMenu($idMenu);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $items = $this->item->getItems($idMenu);
        $this->genererVue(['menu' => $menu, 'items' => $items, 'erreur' => $erreur]);
    }

}
