<?php

require_once 'modele/Item.php';
require_once 'vue/Vue.php';

class ControleurItem {

    private $item;

    public function __construct() {
        $this->item = new Item();
    }

// Ajoute un item à un menu
    public function item($item) {
        $validation_dollar = filter_var($item['prix'], FILTER_VALIDATE_FLOAT);
        if ($validation_dollar) {
            // Ajouter l'item à l'aide du modèle
            $this->item->setItem($item);
            //Recharger la page pour mettre à jour la liste des items associés
            header('Location: index.php?action=menu&id=' . $item['menu_id']);
        } else {
            //Recharger la page avec une erreur près du prix
            header('Location: index.php?action=menu&id=' . $item['menu_id'] . '&erreur=dollar');
        }
    }

// Confirmer la suppression d'un item
    public function confirmer($id) {
        // Lire l'item à l'aide du modèle
        $item = $this->item->getItem($id);
        $vue = new Vue("Confirmer");
        $vue->generer(array('item' => $item));
    }

// Supprimer un item
    public function supprimer($id) {
        // Lire l'item afin d'obtenir le id du menu associé
        $item = $this->item->getItem($id);
        // Supprimer l'item à l'aide du modèle
        $this->item->supprimerItem($id);
        //Recharger la page pour mettre à jour la liste des items associés
        header('Location: index.php?action=menu&id=' . $item['menu_id']);
    }

}