<?php

require 'modele/Modele.php';

// Affiche tous les menus
function acceuil(){
    $menus = getMenus();
    require 'vue/Acceuil.php';
}

// Affiche les détails du menu
function menu($idMenu, $erreur) {
    $menu = getMenu($idMenu);
    $items = getItems($idMenu);
    require 'vue/Menu.php';
}

// Ajoute un item à un menu
function item($item) {
    // Ajoute l'item à l'aide du modèle
    setItem($item);
    // Recharge la page
    header('Location: index.php?action=menu&id=' . $item['menu_id']);
}

// Confirmer la suppression d'un item
function confirmer($id) {
    // Lire l'item à l'aide du modèle
    $item = getItem($id);
    require 'vue/Confirmer.php';
}

// Supprimer un item
function supprimer($id) {
    // Lire un item
    $item = getItem($id);
    // Supprimer l'item
    supprimerItem($id);
    // Recharger la page
    header('Location: index.php?action=menu&id=' . $item['menu_id']);
}

function nouveauMenu(){
    require 'vue/Ajouter.php';
}

// Enregistrer le nouveau menu
function ajouter($menu) {
    setMenus($menu);
    header('Location: index.php');
}

// Recherche et retourne les types pour l'autocomplete
function quelsTypes($term) {
    echo searchType($term);
}

// Afficher une erreur
function erreur($msgErreur) {
    require 'vue/Erreur.php';
}