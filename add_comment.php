<?php
    require("classes/komentarz.php");

    session_start();

    $user = $_SESSION['user_name'];
    $post_id = $_GET['post_id'];
    $content = $_POST['comm_content'];

    $date = date_create();
    $formatted_date = date_format($date, "Y-m-d");

    $_SESSION['post_id'] = $post_id; // trzeba tą zmienną przekazać dalej do klasy

    $komentarz = new Komentarz();
    $komentarz->autor = $user;
    $komentarz->tresc = $content;
    $komentarz->date = $formatted_date;
    $komentarz->Dodaj();

    header("Location: post_view.php?post_id=" . $post_id);
?>