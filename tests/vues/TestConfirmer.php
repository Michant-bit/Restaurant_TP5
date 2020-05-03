<?php

require_once 'vue/Vue.php';
$item = [
        'id' => '100',
        'nom' => 'nom Test',
        'prix' => '10',
        'details' => 'details Test',
        'menu_id' => '101'
    ];
$vue = new Vue('Confirmer');
$vue->generer(['item' => $item]);

