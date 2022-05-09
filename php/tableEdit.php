<?php
require_once "..\includes/connexion_bdd.php";


if (isset($_POST['select'])) {

    if (!empty($_POST['select'])) {
        //ON RECUPERE LE SELECT ENVOYE
        $edit = strip_tags(htmlspecialchars($_POST['select']));


        //CREATION D'UNE SESSION
        $_SESSION['table_edit'] = $edit;

        header('Location: ..\views/administration.php#edit');
    } else
        $_SESSION['error'] = '<div class="erreur">Erreur, selection vide.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';

header('Location: ..\views/administration.php#edit');
