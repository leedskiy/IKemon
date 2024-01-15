<?php
include "Storage.php";
$storage1 = new Storage(new JsonIO(__DIR__ . '/../data/pokemon.json'));
$storage2 = new Storage(new JsonIO(__DIR__ . '/../data/types_colors.json'));
$pokemons = $storage1->findAll();
$types_colors = $storage2->findAll();

$data = [];
$errors = [];
$input = $_GET ?? "";
if ($input) {
    $valid = validate($data, $errors, $input, $types_colors);
    addNewElement($valid, $data, $storage1, $pokemons);
}

function isValidType($newType, $types_colors)
{
    if(!empty($types_colors)) {
        $newType = str_replace(' ', '', $newType);

        foreach ($types_colors as $type => $typeData) {
            if ($newType === $typeData['type']) {
                return true;
            }
        }
    }

    return false;
}

function getTypesString($types_colors)
{
    $str = " ";

    foreach ($types_colors as $type => $typeData) {
        $str = $str . $typeData['type'] . " or ";
    }

    return substr($str, 0, -3);
}

function isCorrectLink($image)
{
    $linkStart = "https://assets.pokemon.com/assets/cms2/img/pokedex/full/";
    $linkEnd = ".png";

    if (substr($image, 0, 56) === $linkStart && substr($image, 59, 4) === $linkEnd) {
        return true;
    }

    return false;
}

function validate(&$data, &$errors, $input, $types_colors)
{
    $data["name"] = null;
    $data["type"] = null;
    $data["hp"] = null;
    $data["attack"] = null;
    $data["defense"] = null;
    $data["price"] = null;
    $data["description"] = null;
    $data["image"] = null;

    $errors["name"] = null;
    $errors["type"] = null;
    $errors["hp"] = null;
    $errors["attack"] = null;
    $errors["defense"] = null;
    $errors["price"] = null;
    $errors["description"] = null;
    $errors["image"] = null;

    // name

    if (isset($input["name"]) && strlen(trim($input["name"])) === 0) {
        $errors["name"] = "name is required";
    } else if (strlen($input["name"]) < 2 || strlen($input["name"]) > 20) {
        $errors["name"] = "length of the name must be from 2 to 20 characters";
    } else {
        $data["name"] = $input["name"];
    }

    // type

    if (isset($input["type"]) && strlen(trim($input["type"])) === 0) {
        $errors["type"] = "type is required";
    } else if (!isValidType($input["type"], $types_colors)) {
        $errors["type"] = "type can only be: " . getTypesString($types_colors);
    } else {
        $data["type"] = $input["type"];
    }

    // hp

    if (isset($input["hp"]) && strlen(trim($input["hp"])) === 0) {
        $errors["hp"] = "hp is required";
    } else if (!is_numeric($input["hp"])) {
        $errors["hp"] = "hp can only be a number";
    } else if (!filter_var($input["hp"], FILTER_VALIDATE_INT) || !filter_var($input["hp"], FILTER_VALIDATE_INT)) {
        $errors["hp"] = "hp can only be an integer";
    } else if ($input["hp"] < 0 || $input["hp"] > 500) {
        $errors["hp"] = "hp can only be between 0 and 500";
    } else {
        $data["hp"] = intval($input["hp"]);
    }

    // attack

    if (isset($input["attack"]) && strlen(trim($input["attack"])) === 0) {
        $errors["attack"] = "attack is required";
    } else if (!is_numeric($input["attack"])) {
        $errors["attack"] = "hp can only be a number";
    } else if (!filter_var($input["attack"], FILTER_VALIDATE_INT) || !filter_var($input["attack"], FILTER_VALIDATE_INT)) {
        $errors["attack"] = "attack can only be an integer";
    } else if ($input["attack"] < 0 || $input["attack"] > 1000) {
        $errors["attack"] = "attack can only be between 0 and 1000";
    } else {
        $data["attack"] = intval($input["attack"]);
    }

    // defense

    if (isset($input["defense"]) && strlen(trim($input["defense"])) === 0) {
        $errors["defense"] = "defense is required";
    } else if (!is_numeric($input["defense"])) {
        $errors["defense"] = "hp can only be a number";
    } else if (!filter_var($input["defense"], FILTER_VALIDATE_INT) || !filter_var($input["defense"], FILTER_VALIDATE_INT)) {
        $errors["defense"] = "defense can only be an integer";
    } else if ($input["defense"] < 0 || $input["defense"] > 500) {
        $errors["defense"] = "defense can only be between 0 and 500";
    } else {
        $data["defense"] = intval($input["defense"]);
    }

    // price

    if (isset($input["price"]) && strlen(trim($input["price"])) === 0) {
        $errors["price"] = "price is required";
    } else if (!is_numeric($input["price"])) {
        $errors["price"] = "hp can only be a number";
    } else if (!filter_var($input["price"], FILTER_VALIDATE_INT) || !filter_var($input["price"], FILTER_VALIDATE_INT)) {
        $errors["price"] = "price can only be an integer";
    } else if ($input["price"] < 0 || $input["price"] > 100000) {
        $errors["price"] = "price can only be between 0 and 100000";
    } else {
        $data["price"] = intval($input["price"]);
    }

    // description

    if (isset($input["description"]) && strlen(trim($input["description"])) === 0) {
        $errors["description"] = "description is required";
    } else {
        $data["description"] = $input["description"];
    }

    // image

    if (isset($input["image"]) && strlen(trim($input["image"])) === 0) {
        $errors["image"] = "image is required";
    } else if (!isCorrectLink($input["image"])) {
        $errors["image"] = "link must start with \"https://assets.pokemon.com/assets/cms2/img/pokedex/full/\", 
        after that image number must consist from 3 digits (1 => 001; 10 => 010) and link must end with \".png\"";
    } else if (!is_numeric(intval(substr($input["image"], 56, 3)))) {
        $errors["image"] = "image number can only be a number";
    }  else if (!filter_var(intval(substr($input["image"], 56, 3)), FILTER_VALIDATE_INT) || 
    !filter_var(intval(substr($input["image"], 56, 3)), FILTER_VALIDATE_INT)) {
        $errors["image"] = "image number can only be an integer"; 
    } else {
        $data["image"] = $input["image"];
    }

    return
        !$errors["name"] &&
        !$errors["type"] &&
        !$errors["hp"] &&
        !$errors["attack"] &&
        !$errors["defense"] &&
        !$errors["price"] &&
        !$errors["description"] &&
        !$errors["image"];
}

function addNewElement($valid, $data, &$storage1, $pokemons)
{
    if ($valid) {
        $new_elem = [
            "name" => $data["name"],
            "type" => $data["type"],
            "hp" => $data["hp"],
            "attack" => $data["attack"],
            "defense" => $data["defense"],
            "price" => $data["price"],
            "description" => $data["description"],
            "image" => $data["image"]
        ];

        if(!empty($pokemons)) {
            $pokemonIds = array_keys($pokemons);
            $lastPokemonIdNum = intval(substr(end($pokemonIds), 4, 10));
            $newPokemonId = "card" . ($lastPokemonIdNum + 1);
            $storage1->addWithId($new_elem, $newPokemonId);
        }
        else {
            $storage1->addWithId($new_elem, "card0");
        }

        header("Location: ../index.php?username=admin");
        exit();
    }
}
