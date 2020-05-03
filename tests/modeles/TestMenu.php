<?php

require_once 'modele/Menu.php';

$tstMenu = new Menu;
$menus = $tstMenu->getMenus();
echo '<h3>Test getMenus : </h3>';
var_dump($menus->rowCount());

echo '<h3>Test getMenu : </h3>';
$menu =  $tstMenu->getMenu(1);
var_dump($menu);