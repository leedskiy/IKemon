<?php
include "Storage.php";
$storage1 = new Storage(new JsonIO(__DIR__ . '/../data/pokemon.json'));
$storage2 = new Storage(new JsonIO(__DIR__ . '/../data/types_colors.json'));
$storage3 = new Storage(new JsonIO(__DIR__ . '/../data/users.json'));
$pokemons = $storage1->findAll();
$types_colors = $storage2->findAll();
$users = $storage3->findAll();

function countCards($pokemons, $username) {
    $count = 0;

    foreach ($pokemons as $elem) {
        if($elem["owner"] === $username) {
            $count = $count + 1;
        }
    }

    return $count;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $username = $_GET["username"] ?? "";
    $user = $storage3->findOne(['username' => $username]);
    $userIsAdmin = $username === "admin" ? true : false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"] ?? "";
    $user = $storage3->findOne(['username' => $username]);
    $userIsAdmin = $username === "admin" ? true : false;
    $error = "";

    if (isset($_POST['card_id'])) {
        $card = $storage1->findOne(['id' => $_POST['card_id']]);

        if(countCards($pokemons, $username) <= 4) {
            if($card["price"] <= $user["money"]) {
                $updatedCard = [
                    "name" => $card["name"],
                    "type" => $card["type"],
                    "hp" => $card["hp"],
                    "attack" => $card["attack"],
                    "defense" => $card["defense"],
                    "price" => $card["price"],
                    "description" => $card["description"],
                    "image" => $card["image"],
                    "owner" => $username,
                    "id" => $card["id"]
                ];

                $updatedUser = [
                    "username" => $user["username"],
                    "email" => $user["email"],
                    "password" => $user["password"],
                    "money" => intval($user["money"]) - intval($card["price"]),
                    "id" => $user["id"]
                ];

                $storage1->update($card['id'], $updatedCard);
                $storage3->update($user['id'], $updatedUser);
            }
            else {
                $error = "you do not have enough money";
            }
        }
        else {
            $error = "you can not have more than 5 cards";
        }
    }

    header("Location: .?username=" . $username . "&error=" . $error);
    exit();
}
?>