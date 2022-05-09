<?php
require_once "..\includes/connexion_bdd.php";


if (isset($_POST['numero']) && isset($_POST['cache'])) {

    if (!empty($_POST['numero']) && !empty($_POST['cache'])) {

        //ON RECUPERE LE POST EN VARIABLE
        $numero = strip_tags(htmlspecialchars($_POST['numero']));
        $cache = strip_tags(htmlspecialchars($_POST['cache']));


        //VERIFIER QUE C'EST UN NUMERO
        if (is_numeric($numero) && is_numeric($cache)) {

            //verifier que ce soit bien 1 ou 0 
            if ($numero >= 1 or $numero <= 2) {

                var_dump($numero);
                //UPDATE DE LA BDD
                $update = $bdd->prepare('UPDATE users SET rang = :rang WHERE id = :id');
                $update->bindValue('rang', $numero);
                $update->bindValue('id', $cache);
                $update->execute();

                header('Location: ..\views/administration.php#edit');
            } else
                $_SESSION['error'] = '<div class="erreur">Erreur, numéro different de 0 ou 1.</div>';
        } else
            $_SESSION['error'] = '<div class="erreur">Erreur, entrez un numero.</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Erreur, selection vide.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
header('Location: ..\views/administration.php#edit');
