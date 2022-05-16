<?php

require_once "..\includes/connexion_bdd.php";



if (isset($_POST['adresse'])  && isset($_POST['pays']) && isset($_POST['type'])  && isset($_POST['code'])) {

    if (!empty($_POST['adresse']) && !empty($_POST['pays']) && !empty($_POST['type'])  && !empty($_POST['code'])) {

        $adresse = strip_tags(htmlspecialchars($_POST['adresse']));
        $pays = strip_tags(htmlspecialchars($_POST['pays']));
        $type = strip_tags(htmlspecialchars($_POST['type']));
        $code = strip_tags(htmlspecialchars($_POST['code']));
        $mission = 0;


        //verifier que la mission soit un bien un nombre positif
        if ($code >= 0 and $type >= 0) {

            if (is_numeric($code) and is_numeric($type)) {


                //AJOUTE DANS LA BDD L'AGENT ET RENVOI SUR LA PAGE
                $create = $bdd->prepare('INSERT INTO planque (adresse,pays,type,code,mission_attribue) VALUES(:adresse,:pays,:type,:code,:mission_attribue)');
                $create->bindValue('adresse', $adresse);
                $create->bindValue('pays', $pays);
                $create->bindValue('type', $type);
                $create->bindValue('code', $code);
                $create->bindValue('mission_attribue', $mission);
                $C = $create->execute();

                $_SESSION['error'] = '<div class="valide">Planque ajouté</div>';

                //
            } else
                $_SESSION['error'] = '<div class="erreur">Erreur sur le code ou le type.</div>';
        } else
            $_SESSION['error'] = '<div class="erreur">Le code ou le type ne peut pas être négatif.</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
header('Location: ..\views/administration.php#creation');
