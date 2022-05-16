<?php
require_once "..\includes/connexion_bdd.php";


if (isset($_POST['cache'])  && isset($_POST['name'])) {

    if (!empty($_POST['cache']) && !empty($_POST['name'])) {


        $id = strip_tags(htmlspecialchars($_POST['cache']));
        $name = strip_tags(htmlspecialchars($_POST['name']));

        //SI LES CHAMPS SONT VIDES ON LES COMPTABILISE PAS POUR AJOUTER SEULEMENT LES CHAMPS PLEINS
        if (!empty($_POST['nomAgent'])) {
            $nomAgent = strip_tags(htmlspecialchars($_POST['nomAgent']));
        } else {
            $nomAgent = "";
        }
        if (!empty($_POST['nomCible'])) {

            $nomCible = strip_tags(htmlspecialchars($_POST['nomCible']));
        } else {
            $nomCible = "";
        }

        if (!empty($_POST['nomContact'])) {
            $nomContact = strip_tags(htmlspecialchars($_POST['nomContact']));
        } else {
            $nomContact = "";
        }
        if (!empty($_POST['planque'])) {
            $planque = strip_tags(htmlspecialchars($_POST['planque']));
        } else {
            $planque = "";
        }

        //variable definie
        $categorieContact = "contact";
        $categorieAgent = "agent";
        $categorieCible = "cible";

        //VERIFIER QUE LA MISSION ENVOYE SOIT LA BONNE
        $edit = $bdd->prepare('SELECT * FROM mission WHERE id = :id AND nom = :nom');
        $edit->bindValue('id', $id);
        $edit->bindValue('nom', $name);
        $edit->execute();
        $editMission = $edit->fetch();

        $pays = $editMission['pays'];
        $specialite = $editMission['specialite_requis'];

        if (!empty($_POST['nomAgent'])) {
            //AGENT
            //NATIONALITE AGENT
            $AN = $bdd->prepare('SELECT * FROM membre WHERE categorie = :categorie AND mission_attribue = :mission_attribue AND nom = :nom');
            $AN->bindValue('categorie', $categorieAgent);
            $AN->bindValue('mission_attribue', 0);
            $AN->bindValue('nom', $nomAgent);
            $AN->execute();
            $AgentNationalite = $AN->fetch();

            $paysAgent = $AgentNationalite['nationalite'];
            $agentNomM = $AgentNationalite['nom'];
        } else {
            $agentNomM = $nomAgent;
        }

        if (!empty($_POST['nomCible'])) {
            //CIBLE
            //Cible = Pas la même nationalite que l'agent
            $C = $bdd->prepare('SELECT * FROM membre WHERE nationalite != :nationalite AND categorie = :categorie AND nom = :nom');
            $C->bindValue('nationalite', $paysAgent);
            $C->bindValue('categorie', $categorieCible);
            $C->bindValue('nom', $nomCible);
            $C->execute();
            $CibleM = $C->fetch();

            $cibleNomM = $CibleM['nom'];
        } else {
            $cibleNomM = $nomCible;
        }


        if (!empty($_POST['nomContact'])) {
            //CONTACT
            $M = $bdd->prepare('SELECT * FROM membre WHERE nationalite = :nationalite AND categorie = :categorie AND mission_attribue = :mission_attribue AND nom = :nom');
            $M->bindValue('nationalite', $pays);
            $M->bindValue('categorie', $categorieContact);
            $M->bindValue('mission_attribue', 0);
            $M->bindValue('nom', $nomContact);
            $M->execute();
            $ContactM = $M->fetch();

            $contactNomM = $ContactM['nom'];
        } else {
            $contactNomM = $nomContact;
        }

        if (!empty($_POST['planque'])) {
            //PLANQUE
            //NATIONALITE PLANQUE - Verifier que la planque soit disponible dans la liste des planques en fonction de l'ID et de la nationalite
            $P = $bdd->prepare('SELECT * FROM planque WHERE pays = :pays AND id = :id AND mission_attribue = :mission_attribue');
            $P->bindValue('pays', $pays);
            $P->bindValue('id', $planque);
            $P->bindValue('mission_attribue', 0);
            $P->execute();
            $PlanqueM = $P->rowcount();
        } else {

            $planque = 0;
            $PlanqueM = 1;
        }





        //SI LES NOMS D'AGENTS CORRESPONDENT
        if ($nomAgent == $agentNomM) {

            //SI LES NOMS DE CONTACTS CORRESPONDENT
            if ($nomContact  == $contactNomM) {
                //SI LES NOMS DE CIBLES CORRESPONDENT
                if ($nomCible == $cibleNomM) {
                    //Verifier que la planque soit disponible dans la liste des planque
                    if ($PlanqueM != 0) {
                        //VERIFICER QUE LE NUMERO DE LA PLANQUE SOIT BIEN UN CHIFFRE
                        if (is_numeric($planque)) {

                            if (!empty($_POST['nomAgent'])) {

                                //ON VA UPDATELES AGENTS/CIBLES/CONTACT/PLANQUE
                                $upA = $bdd->prepare('UPDATE membre SET mission_attribue = :mission_attribue WHERE categorie = :categorie AND id = :id');
                                $upA->bindValue('mission_attribue', $id);
                                $upA->bindValue('categorie', $categorieAgent);
                                $upA->bindValue('id', $AgentNationalite['id']);
                                $upA->execute();
                            }
                            if (!empty($_POST['nomCible'])) {
                                //ON VA UPDATELES AGENTS/CIBLES/CONTACT/PLANQUE
                                $upCI = $bdd->prepare('UPDATE membre SET mission_attribue = :mission_attribue WHERE categorie = :categorie AND id = :id');
                                $upCI->bindValue('mission_attribue', $id);
                                $upCI->bindValue('categorie', $categorieCible);
                                $upCI->bindValue('id', $CibleM['id']);
                                $upCI->execute();
                            }
                            //ON VA UPDATELES CONTACT
                            if (!empty($_POST['nomContact'])) {
                                $upC = $bdd->prepare('UPDATE membre SET mission_attribue = :mission_attribue WHERE categorie = :categorie AND id = :id');
                                $upC->bindValue('mission_attribue', $id);
                                $upC->bindValue('categorie', $categorieContact);
                                $upC->bindValue('id', $ContactM['id']);
                                $upC->execute();
                            }

                            if (!empty($_POST['planque'])) {
                                //ON VA UPDATELES AGENTS/CIBLES/CONTACT/PLANQUE
                                $upP = $bdd->prepare('UPDATE planque SET mission_attribue = :mission_attribue WHERE pays = :pays  AND id = :id');
                                $upP->bindValue('mission_attribue', $id);
                                $upP->bindValue('pays', $pays);
                                $upP->bindValue('id', $planque);
                                $upP->execute();
                            }


                            $_SESSION['error'] = '<div class="valide">Attribution Ok.</div>';
                        } else
                            $_SESSION['error'] = '<div class="erreur">Erreur, de nom de planque.</div>';
                    } else
                        $_SESSION['error'] = '<div class="erreur">Erreur, sur la planque.</div>';
                } else
                    $_SESSION['error'] = '<div class="erreur">Erreur, sur le nom de la cible.</div>';
            } else
                $_SESSION['error'] = '<div class="erreur">Erreur, sur le nom du contact.</div>';
        } else
            $_SESSION['error'] = '<div class="erreur">Erreur, sur le nom d\'agent.</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';
header('Location: ..\views/missionAttribue.php?id=' . $id);
