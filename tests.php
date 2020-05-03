<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleMenu') {
        require 'tests/modeles/TestMenu.php';
    } else if ($_GET['test'] == 'modeleItem') {
        require 'tests/modeles/TestItem.php';
    } else if ($_GET['test'] == 'Menus') {
        require 'tests/vues/TestMenus.php';
    } else if ($_GET['test'] == 'Confirmer') {
        require 'tests/vues/TestConfirmer.php';
    } else if ($_GET['test'] == 'Erreur') {
        require 'tests/vues/TestErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleMenu">Menu</a>
    </li>
    <li>
        <a href="tests.php?test=modeleItem">Item</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=Menus">Menus</a>
    </li>
    <li>
        <a href="tests.php?test=Confirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=Erreur">Erreur</a>
    </li>
</ul>
