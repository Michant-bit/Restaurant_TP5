<?php

require_once 'framework/Vue.php';
$vue = new Vue("Erreur");
$vue->generer(['msgErreur' => '*** Message d\'erreur test ***'], null);

