<?php
include "../php/login_logic.php";
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
    <link rel="stylesheet" href="../css/style_login.css" />
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
                </div>
            </div>
        </div>

        <div class="main">
            <div class="main__container __container">
                <div class="main__content">
                    <h2 class="main__title">
                        Login
                    </h2>

                    <div class="main__body">
                        <form action="" class="main__form1" method="get" enctype="text/plain" novalidate>
                            <div class="form1__body">
                                <div class="from1__item">
                                    <label for="username" class="from1__label">Username:</label>
                                    <input type="text" class="from1__input from1__input1" id="username" value="<?= $input ? $input["username"] : "" ?>" name="username" placeholder="username">
                                    <p class="from1__error1 from1__error"><?= $errors ? $errors["username"] : "" ?></p>
                                </div>
                                <div class="from1__item">
                                    <label for="password" class="from1__label">Password:</label>
                                    <input type="password" class="from1__input from1__input2" id="password" value="<?= $input ? $input["password"] : "" ?>" name="password" placeholder="******">
                                    <p class="from1__error3 from1__error"><?= $errors ? $errors["password"] : "" ?></p>
                                </div>
                            </div>
                            <div class="form1_end">
                                <button class="form1__button form1__button1" type="reset">
                                    <p class="form1__buttext buttext-dark">Reset</p>
                                </button>
                                <button class="form1__button form1__button2" type="submit">
                                    <p class="form1__buttext buttext-dark">Submit</p>
                                </button>
                            </div>
                        </form>
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