<?php

require_once 'framework/Vue.php';
$item = [
        'id' => '100',
        'nom' => 'nom Test',
        'prix' => '10',
        'details' => 'details Test',
        'menu_id' => '101'
    ];
$vue = new Vue('Confirmer', 'Items');
$vue->generer(['item' => $item]);

