<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Zaloguj się</title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="logo">
                    Blog programisty
                </div>
            </div>
            <div class = "form-wrapper">
                <div class="form">
                    <form action="login.php" method="post">
                        <div style="text-align: center">
                            <br>
                            <h1 style="font-size: 24px;">LOGOWANIE</h1>
                        </div>
                    <div class="form-inner">
                        <br><br>
                        Nazwa uzytkownika: <input type="text" name="username">
                        <br><br>
                        Hasło: <input type="password" name="password">
                        <br>
                    </div>
                    <div style="text-align: center;">
                        <input type="submit" value="Zaloguj się">
                    </div>
                    <br>
                    <a href="register_form.php">Załóz konto</a>
                </form>
            </div>
            </div>
            <div class="footer">
                &copy 2020 Rafał Miller
            </div>
        </div>
    </body>
</html>