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
                    <a href="../index.php?username=<?= $username ?>" class="logo__pic">
                        <h1 class="header__logo">
                            IKémon
                        </h1>
                    </a>
                </div>
                <div class="header__right">
                </div>
            </div>
        </div>

        <?php if (($_SERVER['REQUEST_METHOD'] === 'POST') && $user):?>
            <div class="main">
                <div class="main__container __container">
                    <div class="main__content">
                        <form action="../index.php">
                            <button type="submit" class="main__button">
                                <p class="main__buttext buttext-dark">
                                    Logout
                                </p>
                            </button>
                        </form>
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