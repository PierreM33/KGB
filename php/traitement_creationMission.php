<?php

require_once "..\includes/connexion_bdd.php";



if (
    isset($_POST['nom']) && isset($_POST['description'])  && isset($_POST['pays']) && isset($_POST['type'])   && isset($_POST['code']) && isset($_POST['debut']) && isset($_POST['fin'])
    && isset($_POST['specialite'])  && isset($_POST['statut'])
) {

    if (
        !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['pays'])  && !empty($_POST['type'])
        && !empty($_POST['code']) && !empty($_POST['debut']) && !empty($_POST['fin']) && !empty($_POST['specialite'])  && !empty($_POST['statut'])
    ) {

        $nom = strip_tags(htmlspecialchars($_POST['nom']));
        $description = strip_tags(htmlspecialchars($_POST['description']));
        $pays = strip_tags(htmlspecialchars($_POST['pays']));
        $type = strip_tags(htmlspecialchars($_POST['type']));
        $code = strip_tags(htmlspecialchars($_POST['code']));
        $debut = strip_tags(htmlspecialchars($_POST['debut']));
        $fin = strip_tags(htmlspecialchars($_POST['fin']));
        $specialite = strip_tags(htmlspecialchars($_POST['specialite']));
        $statut = strip_tags(htmlspecialchars($_POST['statut']));
        $vide = 0;



        // VERIFICATION SI LE NOM DE MISSION EST DEJA PRIS
        $verif = $bdd->prepare('SELECT * FROM mission WHERE nom = :nom ');
        $verif->bindValue('nom', $nom);
        $verif->execute();
        $V = $verif->rowCount();

        $verifCode = $bdd->prepare('SELECT * FROM mission WHERE code = :code ');
        $verifCode->bindValue('code', $code);
        $verifCode->execute();
        $VCode = $verifCode->rowCount();

        //VERIFICATION SI LA MISSION EST DISPONIBLE
        if ($V == 0) {

            //VERIFICATION DU STATUT
            if ($statut == "cours" or $statut == "echec" or $statut == "preparation" or $statut == "termine") {

                //VERIFICATION DE LA SPECIALITE
                if ($specialite == "sniper" or $specialite == "hack" or $specialite == "discretion"  or $specialite == "surveillance"  or $specialite == "infiltration") {

                    if (is_numeric($code) and $VCode == 0 and $code >= 1) {


                        //VERIFICATION QUE LA DATE SOIT UNE DATE
                        if (isValid($debut) and isValid($fin)) {

                            $dateDebut = date('Y-m-d', strtotime($debut));
                            $dateFin = date('Y-m-d', strtotime($fin));


                            //AJOUTE DANS LA BDD LA MISSION
                            $create = $bdd->prepare('INSERT INTO mission (nom,description,code,pays,type,specialite_requis,date_debut,date_fin,statut) 
                            VALUES(:nom,:description,:code,:pays,:type,:specialite_requis,:date_debut,:date_fin,:statut)');
                            $create->bindValue('nom', $nom);
                            $create->bindValue('description', $description);
                            $create->bindValue('code', $code);
                            $create->bindValue('pays', $pays);
                            $create->bindValue('type', $type);
                            $create->bindValue('specialite_requis', $specialite);
                            $create->bindValue('date_debut', $dateDebut);
                            $create->bindValue('date_fin', $dateFin);
                            $create->bindValue('statut', $statut);
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
            $_SESSION['error'] = '<div class="erreur">La mission existe déjà.</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
header('Location: ..\views/administration.php#creation');
