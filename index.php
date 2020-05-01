<?php

require 'controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {
        
        // À propos
        if ($_GET['action'] == 'apropos') {
            apropos();
        } else

        // Afficher un menu
        if ($_GET['action'] == 'menu') {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                if ($id != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    menu($id, $erreur);
                } else {
                    throw new Exception("Identifiant de menu incorrect");
                }
            } else {
                throw new Exception("Aucun identifiant de menu");
            }

        // Ajouter un item
        } else if ($_GET['action'] == 'item') {
            if (isset($_POST['menu_id'])) {
                $id = intval($_POST['menu_id']);
                if ($id != 0) {
                    // Vérifier si l'item existe
                    $menu = getMenu($id);
                    // Récupérer les données
                    $item = $_POST;
                    // Réaliser l'action item
                    item($item);
                } else {
                    throw new Exception("Identifiant de menu incorrect");
                }
            } else {
                throw new Exception("Aucun identifiant de menu");
            }

        // Confirmer la suppression d'un item
        } else if ($_GET['action'] == 'confirmer') {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmer($id);
                } else {
                    throw new Exception("Identifiant d'item incorrect");
                }
            } else {
                throw new Exception("Aucun identifiant d'item");
            }

        // Supprimer un item
        } else if ($_GET['action'] == 'supprimer') {
            if (isset($_POST['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id']);
                if ($id != 0) {
                    supprimer($id);
                } else {
                    throw new Exception("Identifiant d'item incorrect");
                }
            } else {
                throw new Exception("Aucun identifiant d'item");
            }

        // Ajouter un menu
        } else if ($_GET['action'] == 'nouveauMenu') {
            nouveauMenu();

        // Modifier un menu
        } else if ($_GET['action'] == 'modifier') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    modifier($id);
                } else {
                    throw new Exception("Identifiant de menu incorrect");
                }
            } else {
                throw new Exception("Aucun identifiant de menu");
            }

        // Enregistrer le menu
        } else if ($_GET['action'] == 'ajouter') {
            $menu = $_POST;
            ajouter($menu);

        // Modifier le menu
        } else if ($_GET['action'] == 'modifierMenu') {
            $menu = $_POST;
            if (isset($_POST['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id']);
                if ($id != 0) {
                    modifierMenu($menu, $id);
                } else {
                    throw new Exception("Identifiant de menu incorrect");
                }
            } else {
                throw new Exception("Aucun identifiant de menu");
            }
            

        // Chercher les types pour l'autocomplete
        } else if ($_GET['action'] == 'quelsTypes') {
            quelsTypes($_GET['term']);

        // Fin des actions
        } else {
            throw new Exception("Action non valide");
        }
    } else {
        acceuil();
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}