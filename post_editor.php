<?php
    session_start();
    require("classes/wpis.php");
    require("classes/komentarz.php");
    require("connection.php");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
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
                <h1 style="margin-left: 20px; padding: 5px;">Edycja wpisu</h1>
                <div class="post_editor">
                    <form action="add_post.php" method="post">
                        <b>Tytuł: </b><input type="text" name="title" style="width: 850px;">
                        <br><br>
                        <b>Treść:</b>
                        <br><br>
                        <textarea name="post_content" rows="41" cols="175"></textarea>
                        <br><br>
                        <input type="submit" value="Opublikuj" style="margin-left: 420px; width:100px;">
                    </form>
                </div>
            </div>
            <div class="footer">
                &copy 2020 Rafał Miller
            </div>
        </div>
    </body>
</html>