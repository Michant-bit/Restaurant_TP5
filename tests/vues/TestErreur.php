<?php

require_once 'vue/Vue.php';
$vue = new Vue("Erreur");
$vue->generer(['msgErreur' => '*** Message d\'erreur test ***']);

