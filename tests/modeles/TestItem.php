<?php

require_once 'modele/Item.php';

$tstItem = new Item;
$items = $tstItem->getItems(1);
echo '<h3>Test getItems : </h3>';
var_dump($items->rowCount());

$item = $tstItem->getItem(2);
echo '<h3>Test getItem : </h3>';
var_dump($item);