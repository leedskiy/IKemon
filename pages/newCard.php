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
                <div class="header__right header__right-not-active">
                    <button type="button" class="header_button">
                        <p class="header__acc buttext">
                            Account
                        </p>
                    </button>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="main__container __container">
                <div class="main__content">
                    <h2 class="main__title">
                        Add a new card
                    </h2>

                    <div class="main__body">
                        <form action="" class="main__form1" method="post" enctype="text/plain" novalidate>
                            <div class="form1__body">
                                <div class="from1__item">
                                    <label for="name" class="from1__label">Name:</label>
                                    <input type="text" class="from1__input from1__input1" id="name" name="name" placeholder="name">
                                    <p class="from1__error1 from1__error"></p>
                                </div>
                                <div class="from1__item">
                                    <label for="type" class="from1__label">Type:</label>
                                    <input type="text" class="from1__input from1__input2" id="type" name="type" placeholder="type">
                                    <p class="from1__error2 from1__error"></p>
                                </div>
                                <div class="from1__item">
                                    <label for="hp" class="from1__label">Hp:</label>
                                    <input type="number" class="from1__input from1__input3" id="hp" name="hp" placeholder="99">
                                    <p class="from1__error3 from1__error"></p>
                                </div>
                                <div class="from1__item">
                                    <label for="attack" class="from1__label">Attack:</label>
                                    <input type="number" class="from1__input from1__input3" id="attack" name="attack" placeholder="99">
                                    <p class="from1__error4 from1__error"></p>
                                </div>
                                <div class="from1__item">
                                    <label for="defense" class="from1__label">Defense:</label>
                                    <input type="number" class="from1__input from1__input3" id="defense" name="defense" placeholder="99">
                                    <p class="from1__error5 from1__error"></p>
                                </div>
                                <div class="from1__item">
                                    <label for="price" class="from1__label">Price:</label>
                                    <input type="number" class="from1__input from1__input3" id="price" name="price" placeholder="999">
                                    <p class="from1__error6 from1__error"></p>
                                </div>
                                <div class="from1__item">
                                    <label for="description" class="from1__label">Description:</label>
                                    <textarea class="from1__textarea" id="description" name="description"></textarea>
                                    <p class="from1__error7 from1__error"></p>
                                </div>
                                <div class="from1__item">
                                    <label for="image" class="from1__label">Image:</label>
                                    <input type="text" class="from1__input from1__input3" id="image" name="image" 
                                    value="https://assets.pokemon.com/assets/cms2/img/pokedex/full/<number>.png">
                                    <p class="from1__error8 from1__error"></p>
                                </div>
                            </div>
                            <div class="form1_end">
                                <button class="form1__button form1__button2" type="reset">Reset</button>
                                <button class="form1__button form1__button1" type="submit">Submit</button>
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