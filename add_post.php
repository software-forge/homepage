<?php
    require("classes/wpis.php");

    session_start();

    $title = $_POST['title'];
    $content = $_POST['post_content'];

    //echo 'Tytuł: ' . $title . "<br>Treść: " . $content;

    // Potrzebna data

    $date = date_create();

    $formatted_date = date_format($date, "Y-m-d");

    $wpis = new Wpis();
    $wpis->tytul = $title;
    $wpis->tresc = $content;
    $wpis->data = $formatted_date;
    $wpis->Dodaj();

    header("Location: index.php");
?>