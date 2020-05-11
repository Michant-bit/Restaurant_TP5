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
        //$sql = 'SELECT * FROM menus' . ' order by ID desc';
        $sql = 'SELECT m.id, m.nom, m.date_debut, m.date_fin, m.details, m.email, m.utilisateur_id, u.nom_utilisateur, u.identifiant FROM menus m INNER JOIN utilisateurs u ON m.utilisateur_id = u.id ORDER BY id desc';
        $menus = $this->executerRequete($sql);
        return $menus;
    }

// Envoyer les informations des menus de la liste
    public function setMenus($menu) {
        $sql = 'INSERT INTO menus (nom, date_debut, date_fin, details, email, utilisateur_id) VALUES(?, ?, ?, ?, ?, ?)';
        $resultat = $this->executerRequete($sql, [$menu['nom'], $menu['date_debut'], $menu['date_fin'], $menu['details'], $menu['email'], $menu['utilisateur_id']]);
        return $resultat;
    }

// Renvoyer les informations d'un menu
    function getMenu($idMenu) {
        //$sql = 'SELECT * FROM menus WHERE id = ?';
        $sql = 'SELECT m.id, m.nom, m.date_debut, m.date_fin, m.details, m.email, m.utilisateur_id, u.nom_utilisateur FROM menus m INNER JOIN utilisateurs u ON m.utilisateur_id = u.id WHERE m.id = ?';
        $menu = $this->executerRequete($sql, [$idMenu]);
        if($menu -> rowCount() == 1){
            return $menu->fetch();
        } else {
            throw new Exception("Aucun menu ne correspond à l'identifiant '$idMenu'");
        }
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
