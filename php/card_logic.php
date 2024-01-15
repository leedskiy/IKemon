<?php
include "Storage.php";
$storage1 = new Storage(new JsonIO(__DIR__ . '/../data/pokemon.json'));
$storage2 = new Storage(new JsonIO(__DIR__ . '/../data/types_colors.json'));
$storage3 = new Storage(new JsonIO(__DIR__ . '/../data/users.json'));
$pokemons = $storage1->findAll();
$types_colors = $storage1->findAll();
$users = $storage3->findAll();

$input = $_GET ?? "";
$name = $input["name"] ?? "";
$pokemon = $storage1->findOne(['name' => $name]);

$username = $_GET["username"] ?? "";
if($username) {
    $user = $storage3->findOne(['username' => $username]);
    $userIsAdmin = $username === "admin" ? true : false;
}
?>