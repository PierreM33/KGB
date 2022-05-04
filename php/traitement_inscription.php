<?php

require_once "..\includes/connexion_bdd.php";



if (isset($_POST['user_name']) && isset($_POST['code']) && isset($_POST['password'])) {

    $name = strip_tags(htmlspecialchars($_POST['user_name']));
    $code = strip_tags(htmlspecialchars($_POST['code']));
    $password = strip_tags(password_hash($_POST['password'], PASSWORD_DEFAULT));
    $rang = 0;

    $namelength = strlen($name);


    //ON VERIFIE QUE LES CHAMPS NE SOIENT PAS VIDE
    if (!empty($name) and !empty($code) and !empty($password)) {

        //VERIFIE QUE CODE SOIT UN NOMBRE
        if (is_numeric($code)) {

            //VERIFIER LA LONGUEUR DU NOM AGENT ET PAS DE CARACTERES SPECIAUX
            if ($namelength <= 10 && $namelength >= 1) {

                $verif = $bdd->prepare('SELECT user FROM users WHERE user = :user ');
                $verif->bindValue('user', $name);
                $verif->execute();
                $V = $verif->rowCount();

                //VERIFICATION SI LE NOM D'AGENT EST DIFFERENT
                if ($V == 0) {

                    //ON AJOUTE LE MEMBRE
                    $inscription = $bdd->prepare('INSERT INTO users (user,code,password,rang) VALUES(:user, :code, :password, :rang)');
                    $inscription->bindValue('user', $name);
                    $inscription->bindValue('code', $code);
                    $inscription->bindValue('password', $password);
                    $inscription->bindValue('rang', $rang);
                    $I = $inscription->execute();

                    $_SESSION['error'] = '<div class="valide">Agent inscrit.</div>';
                } else
                    $_SESSION['error'] = '<div class="erreur">Nom de l\'agent existe déjà.</div>';
            } else
                $_SESSION['error'] = '<div class="erreur">Nom d\'agent trop long. Celui-ci ne doit pas dépasser 10 caractères.</div>';
        } else
            $_SESSION['error'] = '<div class="erreur">Le code n\'est pas un chiffre.</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Au moins un des champs est vide.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';

header('Location: ..\views/inscription.php');
