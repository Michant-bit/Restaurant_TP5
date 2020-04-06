<?php

// Connection à la base de données
function getBaseDonnees() {
    $baseDonnees = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $baseDonnees;
}

// Renvoyer la liste de tous les menus
function getMenus() {
    $baseDonnees = getBaseDonnees();
    $menus = $baseDonnees->query('select * from menus' . ' order by ID desc');
    return $menus;
}

// Envoyer les informations des menus de la liste
function setMenus($menus) {
    $baseDonnees = getBaseDonnees();
    $resultat = $baseDonnees->prepare('INSERT INTO menus (nom, date_debut, date_fin, details) VALUES(?, ?, ?, ?)');
    $resultat->execute(array($menu['nom'], $menu['date_debut'], $menu['date_fin'], $menu['details']));
    return $resultat;
}

// Renvoyer les informations d'un menu
function getMenu($idMenu) {
    $baseDonnees = getBaseDonnees();
    $menu = $baseDonnees->prepare('SELECT * FROM menus WHERE id = ?');
    $menu->execute(array($idMenu));

    if($menu -> rowCount() == 1){
        return $menu->fetch();
    } else {
        throw new Exception("Aucun menu ne correspond à l'identifiant '$idMenu'");
    }
    // Return $menu;
}

// Renvoyer la liste des items associés au menu
function getItems($idMenu) {
    $baseDonnees = getBaseDonnees();
    $items = $baseDonnees->prepare('SELECT * FROM items WHERE menu_id = ?'); // METTRE ' . ' entre items et WHERE
    $items->execute(array($idMenu));
    return $items;
}

// Renvoyer un item spécifique
function getItem($id) {
    $baseDonnees = getBaseDonnees();
    $item = $baseDonnees->prepare('SELECT * FROM items WHERE id = ?');
    $item->execute(array($id));

    if($item->rowCount() == 1){
        return $item->fetch();
    } else {
        throw new Exception("Aucun item ne correspond à l'identifiant '$id'");
    }
    // Return $item;
}

// Supprimer un item
function supprimerItem($id){
    $baseDonnees = getBaseDonnees();
    $resultat = $baseDonnees->prepare('DELETE FROM items WHERE id = ?');
    $resultat->execute(array($id));
    return $resultat;
}

// Ajouter un item à un menu
function setItem($item) {
    $baseDonnees = getBaseDonnees();
    $resultat = $baseDonnees -> prepare('INSERT INTO item (nom, prix, details, menu_id) VALUES(?,?,?,?)');
    $resultat->execute(array($item['nom'], $item['prix'], $item['details'], $item['menu_id']));
    return $resultat;
}

// Recherche les types répondant à l'autocomplete
function searchType($term) {
    $conn = getBdd();
    $stmt = $conn->prepare('SELECT type FROM types WHERE type LIKE :term');
    $stmt->execute(array('term' => '%' . $term . '%'));

    while ($row = $stmt->fetch()) {
        $return_arr[] = $row['type'];
    }

    /* Toss back results as json encoded array. */
    return json_encode($return_arr);
}