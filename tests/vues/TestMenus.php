<?php

require_once 'framework/Vue.php';
$menus = [
    [
        'id' => '100',
        'nom' => 'nom Test 1',
        'date_debut' => '2020-05-03',
        'date_fin' => '2020-05-04',
        'details' => 'details Test 1',
        'email' => 'email Test 1',
        'utilisateur_id' => '2',
        'nom_utilisateur' => 'Administration'
    ],
    [
        'id' => '200',
        'nom' => 'nom Test 2',
        'date_debut' => '2020-05-03',
        'date_fin' => '2020-05-04',
        'details' => 'details Test 2',
        'email' => 'email Test 2',
        'utilisateur_id' => '2',
        'nom_utilisateur' => 'Administration'
    ]
];
$vue = new Vue('index', 'AdminMenus');
$vue->generer(['menus' => $menus], null);

