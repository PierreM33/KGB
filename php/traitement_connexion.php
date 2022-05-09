<?php

require_once "..\includes/connexion_bdd.php";



if (isset($_POST['nom']) && isset($_POST['prenom'])) {

    $nom = strip_tags(htmlspecialchars($_POST['nom']));
    $prenom = strip_tags(htmlspecialchars($_POST['prenom']));
    $password = strip_tags(htmlspecialchars($_POST['password']));


    //RECUPERATION DU JOUEUR
    $verif = $bdd->prepare('SELECT * FROM users WHERE nom = :nom AND prenom = :prenom');
    $verif->bindValue('nom', $nom);
    $verif->bindValue('prenom', $prenom);
    $verif->execute();
    $V = $verif->fetch(PDO::FETCH_ASSOC);

    //VERIFICATION DU PASSWORD
    $passwordHash = $V['password'];


    //ON VERIFIE QUE LES CHAMPS NE SOIENT PAS VIDE
    if (!empty($nom) and !empty($prenom) and !empty($password)) {

        //VERIFIER QUE LE PSEUDO EXISTE
        if ($V['nom'] == $nom and $V['prenom'] == $prenom) {

            //VERIFICATION DU PASSWORD HASH
            if (password_verify($password, $passwordHash)) {



                //AJOUTER LA SESSION AU MEMBRE
                $_SESSION['id'] = $V['id'];
                $_SESSION['nom'] = $V['nom'];
                $_SESSION['prenom'] = $V['prenom'];
                //SESSION PAR DEFAUT
                $_SESSION['table_edit'] = "mission";
                $_SESSION['select_categorie'] = "mission";
                $_SESSION['creation_select'] = "mission";



                //ON REDIRIGE VERS LA PAGE
                $_SESSION['error'] = '<div class="valide">Agent connecté.</div>';
            } else
                $_SESSION['error'] = '<div class="erreur">Erreur de password.</div>';
        } else
            $_SESSION['error'] = '<div class="erreur">Le nom d\'agent n\'existe pas .</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Au moins un des champs est vide.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';



header('Location: ..\views/connexion.php');
