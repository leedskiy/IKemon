<?php
include "../php/card_logic.php";
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
    <link rel="stylesheet" href="../css/style_card.css" />
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header__container __container">
                <div class="header__left">
                    <a href="../index.php" class="logo__pic">
                        <h1 class="header__logo">
                            IKémon
                        </h1>
                    </a>
                </div>
                <div class="header__right">
                    <button type="button" class="header__button">
                        <p class="header__acc buttext">
                            Account
                        </p>
                    </button>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="main__container __container">
                <div class="main__details">
                    <div class="details__top">
                        <h2 class="details__name">
                            <?= $pokemon["name"] ?>
                        </h2>
                    </div>

                    <div class="details__body">
                        <div class="details__left">
                            <div class="details__icon" style="background-color: <?= $storage2->findOne(['type' => $pokemon["type"]])["color"] ?>;">
                                <img src="<?= $pokemon["image"] ?>" alt="<?= $pokemon["name"] ?>_img" class="details__image">
                            </div>
                        </div>

                        <div class="details__right">
                            <div class="right__list">
                                <div class="list__type prop">
                                    <p class="type__field field">
                                        Type:
                                    </p>

                                    <p class="type__value">
                                        <?= $pokemon["type"] ?>
                                    </p>
                                </div>

                                <div class="list__hp prop">
                                    <p class="hp__field field">
                                        Hp:
                                    </p>

                                    <p class="hp__value">
                                        <?= $pokemon["hp"] ?>
                                    </p>
                                </div>

                                <div class="list__attack prop">
                                    <p class="attack__field field">
                                        Attack:
                                    </p>

                                    <p class="attack__value">
                                        <?= $pokemon["attack"] ?>
                                    </p>
                                </div>

                                <div class="list__defense prop">
                                    <p class="defense__field field">
                                        Defense:
                                    </p>

                                    <p class="defense__value">
                                        <?= $pokemon["defense"] ?>
                                    </p>
                                </div>

                                <div class="list__price prop">
                                    <p class="price__field field">
                                        Price:
                                    </p>

                                    <p class="price__value">
                                        <?= $pokemon["price"] ?>
                                    </p>
                                </div>

                                <div class="list__descr prop">
                                    <p class="descr__field field">
                                        Description:
                                    </p>

                                    <p class="descr__value">
                                        <?= $pokemon["description"] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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