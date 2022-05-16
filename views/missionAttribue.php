<?php


require_once "header.php";



if (isConnected()) {



    if (isset($_GET["id"])) {

        if (!empty($_GET["id"]))


            $id = strip_tags(htmlspecialchars($_GET['id']));

        // BDD   
        $edit = $bdd->prepare('SELECT * FROM mission WHERE id = :id');
        $edit->bindValue('id', $id);
        $edit->execute();
        $editMission = $edit->fetch();

        $pays = $editMission['pays'];
        $specialite = $editMission['specialite_requis'];
        $categorieContact = "contact";





        $categorieAgent = "agent";


        //AGENT
        //NATIONALITE AGENT
        $AN = $bdd->prepare('SELECT * FROM membre WHERE categorie = :categorie');
        $AN->bindValue('categorie', $categorieAgent);
        $AN->execute();
        $AgentNationalite = $AN->fetch();

        $paysAgent = $AgentNationalite['nationalite'];
        $categorieCible = "cible";








?>
        <section class="containerEdition">
            <div class="containerEdition-1">


                <div class="blocListeEdition">
                    <div class="blocInfoEdition"></br>Sur une mission, la ou les agents ne peuvent pas avoir la même nationalité que le ou les cibles.</br>
                        Sur une mission, il faut assigner au moins 1 agent disposant de la spécialité requise.</br>
                        Sur une mission, les contacts sont obligatoirement de la nationalité du pays de la mission.</br>
                        Sur une mission, la planque est obligatoirement dans le même pays que la mission.
                    </div>
                    <?php
                    // Affiche les erreurs diverses
                    if (!empty($_SESSION['error'])) {
                        echo $_SESSION['error'];
                    } ?>
                    <div class="blocAdminBasEdition">

                        <div class="tableauListe">

                            <table class="Liste">
                                <tr>
                                    <th>Numéro Mission</th>
                                    <th>Nom</th>
                                    <th>Agent</th>
                                    <th>Contact</th>
                                    <th>Cible</th>
                                    <th>Planque</th>
                                    <th>Valider</th>
                                </tr>

                                <tr>
                                    <form method="POST" action="..\<?php echo pathPhp(); ?>traitement_attribueMission.php">

                                        <td class="tdStandard"><input type="hidden" name="cache" value="<?php echo $editMission['id'] ?>"><?php echo $editMission['id'] ?></td>
                                        <td class="tdStandard"><input type="hidden" name="name" value="<?php echo $editMission['nom'] ?>"><?php echo $editMission['nom']; ?></td>
                                        <td class="tdStandard">
                                            <select class="ClassEdition" name="nomAgent">
                                                <?php


                                                //AGENT
                                                //agent = meme specialite
                                                $A = $bdd->prepare('SELECT * FROM membre WHERE specialite = :specialite AND categorie = :categorie AND mission_attribue = :mission_attribue');
                                                $A->bindValue('specialite', $specialite);
                                                $A->bindValue('categorie', $categorieAgent);
                                                $A->bindValue('mission_attribue', 0);
                                                $A->execute();
                                                while ($AgentM = $A->fetch()) {


                                                ?>
                                                    <option value="<?php echo $AgentM['nom'] ?>" name="<?php echo $AgentM['nom'] ?>" selected><?php echo $AgentM['nom'] ?></option>
                                                <?php  }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="tdStandard">
                                            <select class="ClassEdition" name="nomContact">
                                                <?php
                                                //CONTACT
                                                //Contact = Même nationalité que la mission
                                                $M = $bdd->prepare('SELECT * FROM membre WHERE nationalite = :nationalite AND categorie = :categorie AND mission_attribue = :mission_attribue');
                                                $M->bindValue('nationalite', $pays);
                                                $M->bindValue('categorie', $categorieContact);
                                                $M->bindValue('mission_attribue', 0);
                                                $M->execute();
                                                while ($ContactM = $M->fetch()) {

                                                ?>
                                                    <option value="<?php echo $ContactM['nom'] ?>" name="<?php echo $ContactM['nom'] ?>" selected><?php echo $ContactM['nom'] ?></option>
                                                <?php  }
                                                ?>
                                            </select>
                                        </td>

                                        <td class="tdStandard">
                                            <select class="ClassEdition" name="nomCible">
                                                <?php
                                                //CIBLE
                                                //Cible = Pas la même nationalite que l'agent
                                                $C = $bdd->prepare('SELECT * FROM membre WHERE nationalite != :nationalite AND categorie = :categorie AND mission_attribue = :mission_attribue ');
                                                $C->bindValue('nationalite', $paysAgent);
                                                $C->bindValue('categorie', $categorieCible);
                                                $C->bindValue('mission_attribue', 0);
                                                $C->execute();

                                                while ($CibleM = $C->fetch()) {

                                                ?>
                                                    <option value="<?php echo $CibleM['nom'] ?>" name="<?php echo $CibleM['nom'] ?>" selected><?php echo $CibleM['nom'] ?></option>
                                                <?php  }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="tdStandard">
                                            <select class="ClassEdition" name="planque">
                                                <?php

                                                //PLANQUE
                                                //NATIONALITE PLANQUE
                                                $P = $bdd->prepare('SELECT * FROM planque WHERE pays = :pays AND mission_attribue = :mission_attribue');
                                                $P->bindValue('pays', $pays);
                                                $P->bindValue('mission_attribue', 0);
                                                $P->execute();
                                                while ($PlanqueM = $P->fetch()) {

                                                ?>
                                                    <option value="<?php echo $PlanqueM['id'] ?>" name="<?php echo $PlanqueM['id'] ?>" selected><?php echo $PlanqueM['adresse'] ?></option>
                                                <?php  }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="tdStandard"><input class="ClassEditionBouton" type="submit" value="Valider"></td>
                                    </form>
                                </tr>
                            </table>
                            <div class="titreEdit">
                                <a class="missionCreation" href="administration.php#edit">Retour aux missions</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </section>
<?php
    }
} else {
    header('Location:..\index.php');
}
