<?php

require_once 'controleur/ControleurMenu.php';
require_once 'controleur/ControleurItem.php';
require_once 'controleur/ControleurType.php';
require_once 'vue/Vue.php';

class Routeur {

    private $ctrlMenu;
    private $ctrlItem;
    private $ctrlType;

    public function __construct() {
        $this->ctrlMenu = new ControleurMenu();
        $this->ctrlItem = new ControleurItem();
        $this->ctrlType = new ControleurType();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                // À propos
                if ($_GET['action'] == 'apropos') {
                    $this->apropos();
                } else if ($_GET['action'] == 'menu') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        // Vérifier si une erreur est présente
                        $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                        $this->ctrlMenu->menu($id, $erreur);
                    } else
                        throw new Exception("Identifiant de menu non valide");
                } else if ($_GET['action'] == 'item') {
                    // Tester l'existence des paramètres requis
                    $menu_id = intval($this->getParametre($_POST, 'menu_id'));
                    if ($menu_id != 0) {
                        $this->getParametre($_POST, 'nom');
                        $this->getParametre($_POST, 'prix');
                        $this->getParametre($_POST, 'details');
                        // Enregistrer l'item
                        $this->ctrlItem->item($_POST);
                    } else
                        throw new Exception("Identifiant de menu non valide");
                } else if ($_GET['action'] == 'confirmer') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlItem->confirmer($id);
                    } else
                        throw new Exception("Identifiant d'item non valide");
                } else if ($_GET['action'] == 'supprimer') {
                    $id = intval($this->getParametre($_POST, 'id'));
                    if ($id != 0) {
                        $this->ctrlItem->supprimer($id);
                    } else
                        throw new Exception("Identifiant d'item non valide");
                } else if ($_GET['action'] == 'nouveauMenu') {
                    $this->ctrlMenu->nouveauMenu();
                } else if ($_GET['action'] == 'ajouter') {
                    // Tester l'existence des paramètres requis
                    $utilisateur_id = intval($this->getParametre($_POST, 'utilisateur_id'));
                    if ($utilisateur_id != 0) {
                        $this->getParametre($_POST, 'nom');
                        $this->getParametre($_POST, 'date_debut');
                        $this->getParametre($_POST, 'date_fin');
                        $this->getParametre($_POST, 'details');
                        $this->getParametre($_POST, 'email');
                        // Enregistrer le menu
                        $this->ctrlMenu->ajouter($_POST);
                    } else
                        throw new Exception("Identifiant d'utilisateur non valide");
                } else if ($_GET['action'] == 'miseAJourMenu') {
                    // Tester l'existence des paramètres requis
                    $id = intval($this->getParametre($_POST, 'id'));
                    if ($id != 0) {
                        $utilisateur_id = intval($this->getParametre($_POST, 'utilisateur_id'));
                        if ($utilisateur_id != 0) {
                            //Vérifier l'existence des paramètres
                            $this->getParametre($_POST, 'nom');
                            $this->getParametre($_POST, 'date_debut');
                            $this->getParametre($_POST, 'date_fin');
                            $this->getParametre($_POST, 'details');
                            $this->getParametre($_POST, 'email');
                            // Enregistrer le menu
                            $this->ctrlMenu->miseAJourMenu($_POST, $id);
                        } else
                            throw new Exception("Identifiant d'utilisateur non valide");
                    } else
                        throw new Exception("Identifiant de menu non valide");
                } else if ($_GET['action'] == 'modifierMenu') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlMenu->modifierMenu($id);
                    } else
                        throw new Exception("Identifiant de menu non valide");
                } else if ($_GET['action'] == 'quelsTypes') {
                    $term = $this->getParametre($_GET, 'term');
                    $this->ctrlType->quelsTypes($term);
                } else {
                    throw new Exception("Action non valide");
                }
            } else // aucune action définie : affichage des menus par défaut
                $this->ctrlMenu->menus();
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une explication de l'application
    private function apropos() {
        $vue = new Vue("Apropos");
        $vue->generer();
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }

}
