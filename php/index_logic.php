<?php
include "Storage.php";
$storage1 = new Storage(new JsonIO(__DIR__ . '/../data/pokemon.json'));
$storage2 = new Storage(new JsonIO(__DIR__ . '/../data/types_colors.json'));
$storage3 = new Storage(new JsonIO(__DIR__ . '/../data/users.json'));
$pokemons = $storage1->findAll();
$types_colors = $storage2->findAll();
$users = $storage3->findAll();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $username = $_GET["username"] ?? "";
    $user = $storage3->findOne(['username' => $username]);
}
?>