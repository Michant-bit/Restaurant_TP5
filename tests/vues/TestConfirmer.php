<?php

require_once 'framework/Vue.php';
$item = [
        'id' => '100',
        'nomItem' => 'nom Test',
        'prix' => '10',
        'detailsItem' => 'details Test',
        'menu_id' => '101'
    ];
$vue = new Vue('Confirmer', 'AdminItems');
$vue->generer(['item' => $item], null);

