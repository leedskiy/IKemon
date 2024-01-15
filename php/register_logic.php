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
    $valid = validate($data, $errors, $input, $types_colors);
    addNewElement($valid, $data, $storage3, $users);
}

function isUniqueUsername($newUsername, $users)
{
    if(!empty($users)) {
        foreach ($users as $username => $usernameData) {
            if ($newUsername === $usernameData['username']) {
                return false;
            }
        }
    }

    return true;
}

function validate(&$data, &$errors, $input, $users)
{
    $data["username"] = null;
    $data["email"] = null;
    $data["password1"] = null;
    $data["password2"] = null;

    $errors["username"] = null;
    $errors["email"] = null;
    $errors["password1"] = null;
    $errors["password2"] = null;

    // name

    if (isset($input["username"]) && strlen(trim($input["username"])) === 0) {
        $errors["username"] = "username is required";
    } else if (strlen($input["username"]) < 2 || strlen($input["username"]) > 20) {
        $errors["username"] = "length of the username must be from 2 to 20 characters";
    } else if (!isUniqueUsername($input["username"], $users)) {
        $errors["username"] = "there exists user with the same username";
    } else {
        $data["username"] = $input["username"];
    }

    // email

    if(isset($input["email"]) && strlen(trim($input["email"])) === 0) {
        $errors["email"] = "email address is required!";
    }
    else if (!filter_var($input["email"], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'format of the email address is incorrect';
    }
    else {
        $data["email"] = $input["email"];
    }

    // password1

    if (isset($input["password1"]) && strlen(trim($input["password1"])) === 0) {
        $errors["password1"] = "password is required";
    } else if (strlen($input["password1"]) < 5 || strlen($input["password1"]) > 10) {
        $errors["password1"] = "length of the password must be from 5 to 10 characters"; 
    } else {
        $data["password1"] = $input["password1"];
    }

    // password2
    
    if (isset($input["password2"]) && strlen(trim($input["password2"])) === 0) {
        $errors["password2"] = "password confirmation is required";
    } else if ($input["password2"] != $input["password1"]) {
        $errors["password2"] = "passwords must be the same"; 
    } else {
        $data["password2"] = $input["password2"];
    }

    return
        !$errors["username"] &&
        !$errors["email"] &&
        !$errors["password1"] &&
        !$errors["password2"];
}

function addNewElement($valid, $data, &$storage3, $users)
{
    if ($valid) {
        $new_elem = [
            "username" => $data["username"],
            "email" => $data["email"],
            "password" => $data["password1"],
            "money" => 400
        ];
        
        if(!empty($users)) {
            $usersIds = array_keys($users);
            $lastUserIdNum = intval(substr(end($usersIds), 4, 10));
            $newUserId = "user" . ($lastUserIdNum + 1);
            var_dump($lastUserIdNum);
            $storage3->addWithId($new_elem, $newUserId);
        }
        else {
            $storage3->addWithId($new_elem, "user0");
        }

        header("Location: ../index.php?user=" . $data["username"]);
        exit();
    }
}
