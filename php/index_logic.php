<?php
include "Storage.php";
$storage1 = new Storage(new JsonIO(__DIR__ . '/../data/pokemon.json'));
$elems = $storage1->findAll();
