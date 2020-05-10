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

    public function ajouter() {
        $this->genererVue();
    }

// Enregistre le nouveau menu et retourne à la liste des menus
    public function nouveauMenu() {
        $menu['email'] = $this->requete->getParametre('email');
        $validation_email = filter_var($menu['email'], FILTER_VALIDATE_EMAIL);
        if ($validation_email) {
            $menu['nom'] = $this->requete->getParametre('nom');
            $menu['date_debut'] = $this->requete->getParametre('date_debut');
            $menu['date_fin'] = $this->requete->getParametre('date_fin');
            $menu['details'] = $this->requete->getParametre('details');
            $menu['email'] = $this->requete->getParametre('email');
            $menu['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $this->menu->setMenus($menu);
        } else {
            $this->requete->getSession()->setAttribut('erreur', 'email');
            $this->rediriger('Menus', 'ajouter');
        }
        $this->executerAction('index');
    }

// Modifier un menu existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $menu = $this->menu->getMenu($id);
        $this->genererVue(['menu' => $menu]);
    }

// Enregistre le menu modifié et retourne à la liste des menus
    public function miseAJour() {
        $id = $this->requete->getParametreId('id');
        $menu['id'] = $this->requete->getParametreId('id');
        $menu['nom'] = $this->requete->getParametre('nom');
        $menu['date_debut'] = $this->requete->getParametre('date_debut');
        $menu['date_fin'] = $this->requete->getParametre('date_fin');
        $menu['details'] = $this->requete->getParametre('details');
        $menu['email'] = $this->requete->getParametre('email');
        $menu['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
        $this->menu->updateMenu($menu, $id);
        $this->executerAction('index');
    }

}
