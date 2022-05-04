<?php

require_once "..\includes/connexion_bdd.php";



if (isset($_POST['user_name']) && isset($_POST['code'])) {

    $name = strip_tags(htmlspecialchars($_POST['user_name']));
    $code = strip_tags(htmlspecialchars($_POST['code']));
    $password = strip_tags(htmlspecialchars($_POST['password']));


    //RECUPERATION DU JOUEUR
    $verif = $bdd->prepare('SELECT * FROM users WHERE user = :user AND code = :code');
    $verif->bindValue('user', $name);
    $verif->bindValue('code', $code);
    $verif->execute();
    $V = $verif->fetch(PDO::FETCH_ASSOC);

    //VERIFICATION DU PASSWORD
    $passwordHash = $V['password'];


    //ON VERIFIE QUE LES CHAMPS NE SOIENT PAS VIDE
    if (!empty($name) and !empty($code) and !empty($password)) {

        //VERIFIER QUE LE PSEUDO EXISTE
        if ($V['user'] == $name) {

            //VERIFICATION DU PASSWORD HASH
            if (password_verify($password, $passwordHash)) {

                //VERIFIER QUE LE CODE SOIT BIEN NUMERIQUE
                if (is_numeric($code) and $code == $V['code']) {

                    //AJOUTER LA SESSION AU MEMBRE
                    $_SESSION['id'] = $V['id'];
                    $_SESSION['name'] = $V['name'];
                    $_SESSION['code'] = $V['code'];

                    //ON REDIRIGE VERS LA PAGE
                    $_SESSION['error'] = '<div class="valide">Agent connecté.</div>';
                } else
                    $_SESSION['error'] = '<div class="erreur">Le code n\'est pas un chiffre.</div>';
            } else
                $_SESSION['error'] = '<div class="erreur">Erreur de password.</div>';
        } else
            $_SESSION['error'] = '<div class="erreur">Le nom d\'agent n\'existe pas .</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Au moins un des champs est vide.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';



header('Location: ..\views/connexion.php');
