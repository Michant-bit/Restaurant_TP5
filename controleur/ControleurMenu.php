<?php

require_once 'modele/Menu.php';
require_once 'modele/Item.php';
require_once 'vue/Vue.php';

class ControleurMenu {

    private $menu;
    private $item;

    public function __construct() {
        $this->menu = new Menu();
        $this->item = new Item();
    }

// Affiche la liste de tous les menus
    public function menus() {
        $menus = $this->menu->getMenus();
        $vue = new Vue("Menus");
        $vue->generer(['menus' => $menus]);
    }

// Affiche les détails sur un menu
    public function menu($idMenu, $erreur) {
        $menu = $this->menu->getMenu($idMenu);
        $items = $this->item->getItems($idMenu);
        $vue = new Vue("Menu");
        $vue->generer(['menu' => $menu, 'items' => $items, 'erreur' => $erreur]);
    }

    public function nouveauMenu() {
        $vue = new Vue("Ajouter");
        $vue->generer();
    }

// Enregistre le nouveau menu et retourne à la liste des menus *********************************************************
    public function ajouter($menu) {
        $validation_email = filter_var($menu['email'], FILTER_VALIDATE_EMAIL);
        if ($validation_email) {
            $this->menu->setMenu($menu);
            header('Location: index.php');
        } else {
            header('Location: vue/Ajouter.php' . '&erreur=email');
        }
        $this->menus();
    }

// Modifier un menu existant    
    public function modifierMenu($id) {
        $menu = $this->menu->getMenu($id);
        $vue = new Vue("ModifierMenu");
        $vue->generer(['menu' => $menu]);
    }

// Enregistre le menu modifié et retourne à la liste des menus
    public function miseAJourMenu($menu) {
        $this->menu->updateMenu($menu);
        $this->menus();
    }

}
