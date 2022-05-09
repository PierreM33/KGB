<?php
$sessionName = $_SESSION['select_categorie'];

?>

<!-- UTILISE UNE FONCTION JAVA POUR SELECTIONNER LA TABLE --->
<div class="blocAdminHaut">
    <form method="post" action="..\<?php echo pathPhp(); ?>tableSelect.php">
        <select name="select" class="select" id="select" name="select">
            <option value="mission" name="mission" selected>Missions</option>
            <option value="planque" name="planqu">Planques</option>
            <option value="agent" name="agent">Agents</option>
            <option value="cible" name="cible">Cibles</option>
            <option value="contact" name="contact">Contact</option>
            <option value="user" name="user">Users</option>
        </select>
        <input type="submit" class="submit" value="Afficher" />
    </form>
</div>

<div class="nom_session"> <u>Liste en cours : </u> <?php echo ' - ' . $sessionName; ?></div>

<!-- Affichage en fonction de la TABLE -->
<!-- Permet d'afficher le tableau de la liste selectionné -->
<div class="blocAdminBas">

    <div class="tableauListe">

        <?php
        if ($sessionName == "agent") {
        ?>


            <table class="Liste">
                <tr>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>Date Naissance</th>
                    <th>Code</th>
                    <th>Nationalité</th>
                    <th>Spécialité</th>
                    <th>Mission attribué</th>
                </tr>
                <?php

                //Lise des agents
                $A = $bdd->prepare('SELECT * FROM membre WHERE categorie = ? ');
                $A->execute(array($sessionName));
                while ($agent = $A->fetch()) {

                ?>
                    <tr>
                        <td class="tdStandard"><?php echo $agent['nom']; ?></a></td>
                        <td class="tdStandard"><?php echo $agent['prenom']; ?></td>
                        <td class="tdStandard"><?php echo $agent['date_naissance']; ?></td>
                        <td class="tdStandard"><?php echo $agent['code']; ?></td>
                        <td class="tdStandard"><?php echo $agent['nationalite']; ?></td>
                        <td class="tdStandard"><?php echo $agent['specialite']; ?></td>
                        <td class="tdStandard"><?php echo $agent['mission_attribue']; ?></td>
                    </tr>

                <?php  }
                ?>
            </table>


        <?php

        } elseif ($sessionName == "mission") {
        ?>

            <table class="Liste">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Code</th>
                    <th>Pays</th>
                    <th>Agent participe</th>
                    <th>cible participe</th>
                    <th>contact participe</th>
                    <th>planque participe</th>
                    <th>type</th>
                    <th>Spécialité</th>
                    <th>Début</th>
                    <th>Fin</th>
                </tr>
                <?php

                //Lise des missions
                $M = $bdd->prepare('SELECT * FROM mission ');
                $M->execute(array());
                while ($mission = $M->fetch()) {

                ?>
                    <tr>
                        <td class="tdStandard"><?php echo $mission['nom']; ?></a></td>
                        <td class="tdDescription"><?php echo $mission['description']; ?></td>
                        <td class="tdStandard"><?php echo $mission['code']; ?></td>
                        <td class="tdStandard"><?php echo $mission['code']; ?></td>
                        <td class="tdStandard"><?php echo $mission['agent_participe']; ?></td>
                        <td class="tdStandard"><?php echo $mission['cible_participe']; ?></td>
                        <td class="tdStandard"><?php echo $mission['contact_participe']; ?></td>
                        <td class="tdStandard"><?php echo $mission['planque_participe']; ?></td>
                        <td class="tdStandard"><?php echo $mission['type']; ?></td>
                        <td class="tdStandard"><?php echo $mission['specialite_requis']; ?></td>
                        <td class="tdStandard"><?php echo $mission['date_debut']; ?></td>
                        <td class="tdStandard"><?php echo $mission['date_fin']; ?></td>
                    </tr>

                <?php  }
                ?>
            </table>

        <?php

        } elseif ($sessionName == "cible") {
        ?>

            <table class="Liste">
                <tr>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>Date Naissance</th>
                    <th>Code</th>
                    <th>Nationalité</th>
                    <th>Mission attribué</th>
                </tr>
                <?php

                //Lise des cibles
                $C = $bdd->prepare('SELECT * FROM membre WHERE categorie = ?');
                $C->execute(array($sessionName));
                while ($cible = $C->fetch()) {

                ?>
                    <tr>
                        <td class="tdStandard"><?php echo $cible['nom']; ?></a></td>
                        <td class="tdStandard"><?php echo $cible['prenom']; ?></td>
                        <td class="tdStandard"><?php echo $cible['date_naissance']; ?></td>
                        <td class="tdStandard"><?php echo $cible['code']; ?></td>
                        <td class="tdStandard"><?php echo $cible['nationalite']; ?></td>
                        <td class="tdStandard"><?php echo $cible['mission_attribue']; ?></td>
                    </tr>

                <?php  }
                ?>
            </table>

        <?php

        } elseif ($sessionName == "contact") {
        ?>

            <table class="Liste">
                <tr>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>Date Naissance</th>
                    <th>Code</th>
                    <th>Nationalité</th>
                    <th>Mission attribué</th>
                </tr>
                <?php

                //Lise des cibles
                $C = $bdd->prepare('SELECT * FROM membre WHERE categorie = ?');
                $C->execute(array($sessionName));
                while ($contact = $C->fetch()) {

                ?>
                    <tr>
                        <td class="tdStandard"><?php echo $contact['nom']; ?></a></td>
                        <td class="tdStandard"><?php echo $contact['prenom']; ?></td>
                        <td class="tdStandard"><?php echo $contact['date_naissance']; ?></td>
                        <td class="tdStandard"><?php echo $contact['code']; ?></td>
                        <td class="tdStandard"><?php echo $contact['nationalite']; ?></td>
                        <td class="tdStandard"><?php echo $contact['mission_attribue']; ?></td>
                    </tr>

                <?php  }
                ?>
            </table>

        <?php


        } elseif ($sessionName == "planque") {
        ?>

            <table class="Liste">
                <tr>
                    <th>Adresse</th>
                    <th>Pays</th>
                    <th>Type</th>
                    <th>Code</th>
                    <th>Mission attribué</th>
                </tr>
                <?php

                //Lise des cibles
                $P = $bdd->prepare('SELECT * FROM planque ');
                $P->execute(array());
                while ($planque = $P->fetch()) {

                ?>
                    <tr>
                        <td class="tdStandard"><?php echo $planque['adresse']; ?></a></td>
                        <td class="tdStandard"><?php echo $planque['pays']; ?></td>
                        <td class="tdStandard"><?php echo $planque['type']; ?></td>
                        <td class="tdStandard"><?php echo $planque['code']; ?></td>
                        <td class="tdStandard"><?php echo $planque['mission_attribue']; ?></td>
                    </tr>

                <?php  }
                ?>
            </table>

        <?php

        } elseif ($sessionName == "user") {
        ?>

            <table class="Liste">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>code</th>
                    <th>Rang</th>
                </tr>
                <?php

                //Lise des cibles
                $U = $bdd->prepare('SELECT * FROM users ');
                $U->execute(array());
                while ($user = $U->fetch()) {

                ?>
                    <tr>
                        <td class="tdStandard"><?php echo $user['id']; ?></a></td>
                        <td class="tdStandard"><?php echo $user['user']; ?></a></td>
                        <td class="tdStandard"><?php echo $user['code']; ?></td>
                        <td class="tdStandard"><?php echo $user['rang']; ?></td>
                    </tr>

                <?php  }
                ?>
            </table>

        <?php

        }

        ?>

    </div>

</div>