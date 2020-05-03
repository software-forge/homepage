<?php
    $link = '<a href="logout.php" class="navlink">WYLOGUJ SIĘ</a>';                    

    if(!isset($_SESSION['logged_in']) or $_SESSION['logged_in'] === false)
    {
        $link = '<a href="login_form.php" class="navlink">ZALOGUJ SIĘ</a>';
    }

    echo '<div class="login_link">';
    echo $link;
    echo '</div>';
?>