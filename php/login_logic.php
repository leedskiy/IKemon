<?php
include "Storage.php";
$storage1 = new Storage(new JsonIO(__DIR__ . '/../data/pokemon.json'));
$storage2 = new Storage(new JsonIO(__DIR__ . '/../data/types_colors.json'));
$storage3 = new Storage(new JsonIO(__DIR__ . '/../data/users.json'));
$pokemons = $storage1->findAll();
$types_colors = $storage2->findAll();
$users = $storage3->findAll() ?? null;

$data = [];
$errors = [];
$input = $_GET ?? "";

if ($input) {
    $valid = validate($data, $errors, $input, $users);

    if($valid) {
        header("Location: ../index.php?username=" . $data["username"]);
        exit();
    }
}

function isCorrectUsername($possibleUsername, $users)
{
    if(!empty($users)) {
        foreach ($users as $username => $usernameData) {
            if ($possibleUsername === $usernameData['username']) {
                return true;
            }
        }
    }

    return false;
}

function isCorrectPassword($possibleUsername, $password, $users)
{
    if(!empty($users)) {
        foreach ($users as $username => $usernameData) {
            if ($possibleUsername === $usernameData['username']) {
                if($password === $usernameData['password']){
                    return true;
                }
            }
        }
    }

    return false;
}

function validate(&$data, &$errors, $input, $users)
{
    $data["username"] = null;
    $data["password"] = null;

    $errors["username"] = null;
    $errors["password"] = null;

    // name

    if (isset($input["username"]) && strlen(trim($input["username"])) === 0) {
        $errors["username"] = "username is required";
    } else if (!isCorrectUsername($input["username"], $users)){
        $errors["username"] = "username does not exist";
    } else {
        $data["username"] = $input["username"];
    }

    // password

    if (isset($input["password"]) && strlen(trim($input["password"])) === 0) {
        $errors["password"] = "password is required";
    } else if (strlen($input["password"]) < 5 || strlen($input["password"]) > 10) {
        $errors["password"] = "length of the password must be from 5 to 10 characters"; 
    } else if ($data["username"] != null && !isCorrectPassword($data["username"], $input["password"], $users)) {
        $errors["password"] = "password is incorrect"; 
    } else {
        $data["password"] = $input["password"];
    }

    return
        !$errors["username"] &&
        !$errors["password"];
}