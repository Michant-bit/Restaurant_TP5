<?php

require_once 'controleur/ControleurAdmin.php';
require_once 'modele/Item.php';

class ControleurAdminItems extends ControleurAdmin {

    private $item;

    public function __construct() {
        $this->item = new Item();
    }
    
// N'est pas content si non utilisé
    public function index() {
        $items = $this->item->getItems();
        $this->genererVue(['items' => $items]);
    }

// Ajoute un item à un menu
    public function ajouter() {
        $item['menu_id'] = $this->requete->getParametreId("menu_id");
        $item['prix'] = $this->requete->getParametre("prix");
        $validation_dollar = filter_var($item['prix'], FILTER_VALIDATE_FLOAT);
        if ($validation_dollar) {
            $item['nom'] = $this->requete->getParametre('nom');
            $item['prix'] = $this->requete->getParametre('prix');
            $item['details'] = $this->requete->getParametre('details');
            // Ajouter l'item à l'aide du modèle
            $this->item->setItem($item);
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            //Recharger la page pour mettre à jour la liste des items associés
            $this->rediriger('Menus', 'lire/' . $item['menu_id']);
        } else {
            //Recharger la page avec une erreur près du prix
            $this->requete->getSession()->setAttribut('erreur', 'dollar');
            $this->rediriger('Menus', 'lire/' . $item['menu_id']);
        }
    }

// Confirmer la suppression d'un item
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire l'item à l'aide du modèle
        $item = $this->item->getItem($id);
        $this->genererVue(['item' => $item]);
    }

// Supprimer un item
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire l'item afin d'obtenir le id du menu associé
        $item = $this->item->getItem($id);
        // Supprimer l'item à l'aide du modèle
        $this->item->supprimerItem($id);
        //Recharger la page pour mettre à jour la liste des items associés
        $this->rediriger('Menus', 'lire/' . $item['menu_id']);
    }

// Supprimer un item définitivement
    public function supprimerDef() {
        $id = $this->requete->getParametreId("id");
        // Lire l'item afin d'obtenir le id du menu associé
        $item = $this->item->getItem($id);
        // Supprimer l'item à l'aide du modèle
        $this->item->supprimerDefItem($id);
        //Recharger la page pour mettre à jour la liste des items associés
        $this->rediriger('Menus', 'lire/' . $item['menu_id']);
    }

// Rétablir un item
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire l'item afin d'obtenir le id du menu associé
        $item = $this->item->getItem($id);
        // Restaurer l'item à l'aide du modèle
        $this->item->restoreItem($id);
        //Recharger la page pour mettre à jour la liste des items associés
        $this->rediriger('Menus', 'lire/' . $item['menu_id']);
    }

}