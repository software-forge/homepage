<?php

    session_start();
    require("classes/wpis.php");
    require("connection.php");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Blog programisty</title>
    </head>
    <body>
        <div class="container">
            <div class = "header">
                <div class="logo">
                    Blog programisty
                </div>
            </div>
            <div class = "navbar">
                <div class="nav-main">
                    <a href="index.php" class="navlink">BLOG</a>
                    <a href="#" class="navlink">AUTOR</a>
                    <a href="#" class="navlink">KONTAKT</a>
                </div>
                <?php 
                    require("login_link.php");
                ?>
            </div>
            <div class="main">
                    <h1 style="margin-left: 20px; padding: 5px;">Wpisy na blogu:</h1>
                    <?php
                        $connection = new mysqli($servername, $username, $password, $dbname);

                        if($connection->connect_error)
                        {
                            echo "Błąd połączenia z bazą!";
                        }

                        $query = "SELECT id, data, tytul, tresc, edytowany FROM Wpisy ORDER BY data DESC LIMIT 10";

                        $result = $connection->query($query);

                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $id = $row['id'];

                                $title = $row['tytul'];

                                $content = $row['tresc'];

                                echo
                                '
                                    <div class="post_miniature">
                                        <b>' . $title . '</b>
                                        <p>' . $content . '</p>
                                        <b style="float:right;"><a href="' . 'post_view.php?post_id=' . $id . '">Czytaj dalej -></a></b>
                                    </div>
                                ';
                            }
                        }
                        else
                        {
                            echo "<p><Brak wpisów na blogu</p>";
                        }

                        if($result->num_rows < 10)
                        {
                            echo
                            '
                                <div style="text-align: center;">
                                    <b style="color: gray; text-decoration: underline;"><< Poprzednia strona</b>
                                    <b><a href="#">Następna strona >></a></b>
                                </div>
                            ';
                        }
                        else
                        {
                            echo
                            '
                                <div style="text-align: center;">
                                    <a href="#"><< Poprzednia strona</a>
                                    <a href="#">Następna strona >></a>
                                </div>
                            ';
                        }
                        
                    ?>
                    
            </div>
            <div class="footer">
                &copy 2020 Rafał Miller
                <?php

                    if(isset($_SESSION['logged_in']) and $_SESSION['logged_in'] === true)
                    {
                        if($_SESSION['privilege'] === '1')
                            echo '<a href="post_editor.php" class="navlink" style="float: right;">OPUBLIKUJ WPIS</a>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>