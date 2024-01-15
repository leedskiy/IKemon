<?php
include "../php/account_logic.php";
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style_account.css" />
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header__container __container">
                <div class="header__left">
                    <a href="../index.php?username=<?= $username ?? "" ?>" class="logo__pic">
                        <h1 class="header__logo">
                            IKémon
                        </h1>
                    </a>
                </div>
                <div class="header__right">
                    <?php if (($_SERVER['REQUEST_METHOD'] === 'POST') && $user):?>
                    <form action="../index.php">
                        <button type="submit" class="header__button">
                            <p class="header__acc buttext-dark">
                                Logout
                            </p>
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if (($_SERVER['REQUEST_METHOD'] === 'POST') && $user):?>
            <div class="main">
                <div class="main__container __container">
                    <div class="main__top">
                        <h3 class="main__username">Username: <?= $username ?></h3>
                        <h3 class="main__email">Email: <?= $user["email"] ?></h3>
                        <h3 class="main__money">Money: <?= $user["money"] ?></h3>
                        <h3 class="main__cards">Cards:</h3>
                    </div>

                    <div class="main__list">
                        <div class="list__container">
                            <?php foreach ($pokemons as $elem) : ?>
                                <?php if ($elem["owner"] === $username) : ?>
                                    <div class="list__card">
                                        <div class="card_top" style="background-color: <?= $storage2->findOne(['type' => $elem["type"]])["color"] ?>;">
                                            <div class="card__icon">
                                                <img src="<?= $elem["image"] ?>" alt="<?= $elem["name"] ?>_img" class="card__image">
                                            </div>
                                        </div>

                                        <div class="card__mid">
                                            <p class="card__link link">
                                                <a href="../pages/card.php?name=<?= $elem["name"] ?>&username=<?= $username ?>" 
                                                class="card__name">
                                                    <?= $elem["name"] ?>
                                                </a>
                                            </p>

                                            <div class="card__type prop">
                                                <div class="type__icon icon">
                                                    <img src="../img/tag_icon.png" alt="tag_icon" class="type__image">
                                                </div>

                                                <p class="type__value">
                                                    <?= $elem["type"] ?>
                                                </p>
                                            </div>

                                            <div class="card__chars">
                                                <div class="chars__hp prop">
                                                    <div class="hp_icon icon">
                                                        <img src="../img/heart_icon.png" alt="heart_icon" class="hp__image">
                                                    </div>

                                                    <p class="hp__value">
                                                        <?= $elem["hp"] ?>
                                                    </p>
                                                </div>

                                                <div class="chars__attack prop">
                                                    <div class="attack__icon icon">
                                                        <img src="../img/swords_icon.png" alt="swords_icon" class="attack__image">
                                                    </div>

                                                    <p class="attack__value">
                                                        <?= $elem["attack"] ?>
                                                    </p>
                                                </div>

                                                <div class="chars__defense prop">
                                                    <div class="defense__icon icon">
                                                        <img src="../img/shield_icon.png" alt="shield_icon" class="defense__image">
                                                    </div>

                                                    <p class="defense__value">
                                                        <?= $elem["defense"] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if(!$userIsAdmin && $user): ?>
                                            <button type="button" class="card__bottom" style="
                                            background-color: <?= $storage2->findOne(['type' => $elem["type"]])["color"] ?>;">
                                                <div class="card__price prop">
                                                    <p class="<?=
                                                        $storage2->findOne(['type' => $elem["type"]])["text_color"]
                                                            == "#000000" ? "buttext-dark" : "buttext-light" ?>">
                                                        Sell:
                                                    </p>

                                                    <p class="price__value <?=
                                                        $storage2->findOne(['type' => $elem["type"]])["text_color"]
                                                            == "#000000" ? "buttext-dark" : "buttext-light" ?>">
                                                        <?= $elem["price"] ?>
                                                    </p>
                                                </div>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="main__bottom">
                        
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="main">
                <div class="main__container __container">
                    <div class="main__content">
                        <form action="login.php">
                            <button type="submit" class="main__button">
                                <p class="main__buttext buttext-dark">
                                    Login
                                </p>
                            </button>
                        </form>
                        <form action="register.php">
                            <button type="submit" class="main__button">
                                <p class="main__buttext buttext-dark">
                                    Register
                                </p>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="footer">
            <div class="footer__container __container">
                <h3 class="footer__text link">
                    <a href="https://github.com/leedskiy" class="footer__link" target="_blank">
                        Website by Illia Takhtamyshev
                    </a>
                </h3>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>