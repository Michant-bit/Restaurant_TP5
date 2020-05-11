<?php

require_once 'framework/Modele.php';

/**
 * Fournit les services d'accès aux items
 * 
 * @author Antoine La Boissière
 */
class Item extends Modele {

// Renvoyer la liste des items associés au menu
    public function getItems($idMenu) {
        //$sql = 'SELECT * FROM items WHERE menu_id = ?';
        $sql = 'SELECT i.id, i.nom, i.prix, i.details, i.efface, i.menu_id FROM items i INNER JOIN menus m ON i.menu_id = m.id WHERE menu_id = ?';
        $items = $this->executerRequete($sql, [$idMenu]);
        return $items;
    }

// Renvoyer un item spécifique
    public function getItem($id) {
        $sql = 'SELECT * FROM items WHERE id = ?';
        $item = $this->executerRequete($sql, [$id]);
        if($item->rowCount() == 1){
            return $item->fetch();
        } else {
            throw new Exception("Aucun item ne correspond à l'identifiant '$id'");
        }
        // Return $item;
}

// Supprimer un item
    public function supprimerItem($id){
        $sql = 'UPDATE items SET efface = 1 WHERE id = ?';
        $resultat = $this->executerRequete($sql, [$id]);
        return $resultat;
    }

// Supprimer un item définitivement
    public function supprimerDefItem($id){
        $sql = 'DELETE FROM items WHERE id = ?';
        $resultat = $this->executerRequete($sql, [$id]);
        return $resultat;
    }

// Réactive un item
    public function restoreItem($id) {
        $sql = 'UPDATE items SET efface = 0 WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajouter un item à un menu
    public function setItem($item) {
        $sql = 'INSERT INTO items (nom, prix, details, menu_id) VALUES(?,?,?,?)';
        $resultat = $this->executerRequete($sql, [$item['nom'], $item['prix'], $item['details'], $item['menu_id']]);
        return $resultat;
    }

}