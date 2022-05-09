<?php
require_once "../views/header.php";


if (isset($_POST['select'])) {

    if (!empty($_POST['select'])) {
        //ON RECUPERE LE SELECT ENVOYE
        $select = strip_tags(htmlspecialchars($_POST['select']));


        //CREATION D'UNE SESSION
        $_SESSION['creation_select'] = $select;

        header('Location: ..\views/administration.php#creation');
    } else
        $_SESSION['error'] = '<div class="erreur">Erreur, selection vide.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
header('Location: ..\views/administration.php#creation');
