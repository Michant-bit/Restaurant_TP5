<?php

require_once 'framework/Modele.php';

/**
 * Fournit les services d'accès aux menus
 * 
 * @author Antoine La Boissière
 */
class Menu extends Modele {

// Renvoyer la liste de tous les menus
    public function getMenus() {
        $sql = 'SELECT * FROM menus' . ' order by ID desc';
        $menus = $this->executerRequete($sql);
        return $menus;
    }

// Envoyer les informations des menus de la liste
    public function setMenus($menu) {
        $sql = 'INSERT INTO menus (nom, date_debut, date_fin, details, email) VALUES(?, ?, ?, ?, ?)';
        $resultat = $this->executerRequete($sql, [$menu['nom'], $menu['date_debut'], $menu['date_fin'], $menu['details'], $menu['email']]);
        return $resultat;
    }

// Renvoyer les informations d'un menu
    function getMenu($idMenu) {
        $sql = 'SELECT * FROM menus WHERE id = ?';
        $menu = $this->executerRequete($sql, [$idMenu]);
        if($menu -> rowCount() == 1){
            return $menu->fetch();
        } else {
            throw new Exception("Aucun menu ne correspond à l'identifiant '$idMenu'");
        }
        // return $menu; 
    }

// Mets à jour les informations des menus de la liste
    public function updateMenu($menu, $id) {
        $sql = 'UPDATE menus SET nom = ?, date_debut = ?, date_fin = ?, details = ?, email = ? WHERE id = ?';
        $resultat = $this->executerRequete($sql, [$menu['nom'], $menu['date_debut'], $menu['date_fin'], $menu['details'], $menu['email'], $id]);
        return $resultat;
    }

// Supprimer un menu
    public function supprimerMenu($id){
        $sql = 'DELETE FROM menus WHERE id = ?';
        $resultat = $this->executerRequete($sql, [$id]);
        return $resultat;
    }

}
