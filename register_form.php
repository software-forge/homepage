<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Zakładanie konta</title>
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
                    <form action="register.php">
                        <div style="text-align: center">
                        <br>
                        <h1 style="font-size: 24px;">ZAKŁADANIE KONTA</h1>
                    </div>
                    <div class="form-inner">
                        Nazwa uzytkownika: <input type="text" name="username">
                        <br><br>
                        Adres e-mail: <input type="text" name="email">
                        <br><br>
                        Hasło: <input type="password" name="password">
                        <br><br>
                        Powtórz hasło: <input type="password" name="confirm-password">
                        <br><br>
                    </div>
                    <div style="text-align: center;">
                        <br><br>
                        <input type="submit" value="Załóz konto">
                    </div>
                </form>
            </div>
            </div>
            
            <div class="footer">
                &copy 2020 Rafał Miller
            </div>
        </div>
    </body>
</html>