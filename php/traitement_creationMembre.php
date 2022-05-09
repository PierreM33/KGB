<?php

require_once "..\includes/connexion_bdd.php";



if (
    isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['naissance']) && isset($_POST['pays'])
    && isset($_POST['specialite']) && isset($_POST['code']) && isset($_POST['categorie'])
) {

    if (
        !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['naissance'])
        && !empty($_POST['pays']) && !empty($_POST['specialite'])  && !empty($_POST['code']) && !empty($_POST['categorie'])
    ) {

        $nom = strip_tags(htmlspecialchars($_POST['nom']));
        $prenom = strip_tags(htmlspecialchars($_POST['prenom']));
        $naissance = strip_tags(htmlspecialchars($_POST['naissance']));
        $pays = strip_tags(htmlspecialchars($_POST['pays']));
        $specialite = strip_tags(htmlspecialchars($_POST['specialite']));
        $categorie = strip_tags(htmlspecialchars($_POST['categorie']));
        $code = strip_tags(htmlspecialchars($_POST['code']));
        $mission = 0;


        // VERIFICATION SI LE CODE EST DEJA PRIS

        $verif = $bdd->prepare('SELECT * FROM membre WHERE code = :code ');
        $verif->bindValue('code', $code);
        $verif->execute();
        $V = $verif->rowCount();

        //VERIFICATION SI LE CODE D'AGENT EST DIFFERENT
        if ($V == 0) {

            //VERIFICATION DE LA CATEGORIE
            if ($categorie == "agent" or $categorie == "contact" or $categorie == "cible") {

                //VERIFICATION DE LA SPECIALITE
                if ($specialite == "sniper" or $specialite == "hack" or $categorie == "discretion"  or $categorie == "surveillance"  or $categorie == "infiltration") {

                    if (is_numeric($code) and $V == 0 and $code >= 1) {

                        //VERIFICATION QUE LA DATE SOIT UNE DATE
                        if (isValid($naissance)) {

                            $dateNaissance = date('Y-m-d', strtotime($_POST['naissance']));

                            //AJOUTE DANS LA BDD L'AGENT ET RENVOI SUR LA PAGE
                            $create = $bdd->prepare('INSERT INTO membre (nom,prenom,date_naissance,nationalite,code,specialite,categorie,mission_attribue) VALUES(:nom,:prenom,:date_naissance,:nationalite,:code,:specialite,:categorie,:mission_attribue)');
                            $create->bindValue('nom', $nom);
                            $create->bindValue('prenom', $prenom);
                            $create->bindValue('date_naissance', $dateNaissance);
                            $create->bindValue('nationalite', $pays);
                            $create->bindValue('code', $code);
                            $create->bindValue('specialite', $specialite);
                            $create->bindValue('categorie', $categorie);
                            $create->bindValue('mission_attribue', $mission);
                            $C = $create->execute();

                            $_SESSION['error'] = '<div class="valide">Membre ajouté</div>';

                            //
                        } else
                            $_SESSION['error'] = '<div class="erreur">Erreur sur la date de naissance.</div>';
                    } else
                        $_SESSION['error'] = '<div class="erreur">Erreur sur le code.</div>';
                } else
                    $_SESSION['error'] = '<div class="erreur">La spécialité renseigné n\'est pas correct.</div>';
            } else
                $_SESSION['error'] = '<div class="erreur">La catégorie renseigné n\'est pas correct.</div>';
        } else
            $_SESSION['error'] = '<div class="erreur">Le code est déjà pris.</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
header('Location: ..\views/administration.php#creation');
