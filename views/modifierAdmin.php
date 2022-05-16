<?php

$sessionEdit = $_SESSION['table_edit'];
if (isConnected() and $rang >= 2) {
?>

    <!-- UTILISE UNE FONCTION JAVA POUR SELECTIONNER LA TABLE --->
    <div class="blocAdminHaut">
        <form method="post" action="..\<?php echo pathPhp(); ?>tableEdit.php">
            <select name="select" class="select" id="select">
                <option value="mission" name="mission" selected>Missions</option>
                <option value="planque" name="planqu">Planques</option>
                <option value="agent" name="agent">Agents</option>
                <option value="cible" name="cible">Cibles</option>
                <option value="contact" name="contact">Contact</option>
                <option value="user" name="user">Users</option>
            </select>
            <input type="submit" class="submit" value="Modifier" />
        </form>
    </div>



    <div class="nom_session"> <u>Modifier : </u> <?php echo ' - ' . $sessionEdit; ?></div>

    <!-- Affichage en fonction de la TABLE -->
    <!-- Permet d'afficher le tableau de la liste selectionné -->
    <div class="blocAdminBas">

        <div class="tableauListe">

            <?php
            if ($sessionEdit == "agent") {
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
                        <th>editer</th>
                    </tr>
                    <?php

                    //Lise des agents
                    $A = $bdd->prepare('SELECT * FROM membre WHERE categorie = ? ');
                    $A->execute(array($sessionEdit));
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
                            <td class="tdStandard"><a href="agent.php?id=<?php echo $agent['id']; ?>" class="detail">Modifier</a></td>
                        </tr>

                    <?php  }
                    ?>
                </table>


            <?php

            } elseif ($sessionEdit == "mission") {
            ?>

                <table class="Liste">
                    <tr>
                        <th>Mission n°</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Code</th>
                        <th>Pays</th>
                        <th>type</th>
                        <th>Spécialité</th>
                        <th>Modifier</th>
                        <th>Attribuer</th>
                    </tr>
                    <?php

                    //Lise des missions
                    $M = $bdd->prepare('SELECT * FROM mission ');
                    $M->execute(array());
                    while ($mission = $M->fetch()) {

                    ?>
                        <tr>
                            <td class="tdStandard"><?php echo $mission['id']; ?></a></td>
                            <td class="tdStandard"><?php echo $mission['nom']; ?></a></td>
                            <td class="tdDescription"><?php echo $mission['description']; ?></td>
                            <td class="tdStandard"><?php echo $mission['code']; ?></td>
                            <td class="tdStandard"><?php echo $mission['code']; ?></td>
                            <td class="tdStandard"><?php echo $mission['type']; ?></td>
                            <td class="tdStandard"><?php echo $mission['specialite_requis']; ?></td>
                            <td class="tdStandard"><a href="missionModifier.php?id=<?php echo $mission['id']; ?>" class="detail">Modifier</a></td>
                            <td class="tdStandard"><a href="missionAttribue.php?id=<?php echo $mission['id']; ?>" class="detail">Attribuer</a></td>
                        </tr>

                    <?php  }
                    ?>
                </table>

            <?php

            } elseif ($sessionEdit == "cible") {
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
                    $C = $bdd->prepare('SELECT * FROM membre WHERE categorie = ? ');
                    $C->execute(array($sessionEdit));
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

            } elseif ($sessionEdit == "contact") {
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
                    $C = $bdd->prepare('SELECT * FROM membre WHERE categorie = ?  ');
                    $C->execute(array($sessionEdit));
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


            } elseif ($sessionEdit == "planque") {
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

            } elseif ($sessionEdit == "user") {
            ?>

                <table class="Liste">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>prenom</th>
                        <th>email</th>
                        <th>Rang</th>
                        <th>Date de création</th>
                        <th>Modifier</th>
                    </tr>
                    <?php

                    //Lise des cibles
                    $U = $bdd->prepare('SELECT * FROM users ');
                    $U->execute(array());
                    while ($user = $U->fetch()) {

                    ?>
                        <tr>
                            <td class="tdStandard"><?php echo $user['id']; ?></a></td>
                            <td class="tdStandard"><?php echo $user['nom']; ?></a></td>
                            <td class="tdStandard"><?php echo $user['prenom']; ?></a></td>
                            <td class="tdStandard"><?php echo $user['email']; ?></td>
                            <td class="tdStandard"><?php if ($user['rang'] == 2) {
                                                        echo "Administrateur";
                                                    } else {
                                                        echo "Membre";
                                                    }; ?></td>
                            <td class="tdStandard"><?php echo $user['date_creation']; ?></td>
                            <td class="tdStandard"><a href="editUser.php?id=<?php echo $user['id']; ?>" class="detail">Modifier</a></td>
                        </tr>

                    <?php  }
                    ?>
                </table>

            <?php

            }

            ?>

        </div>

    </div>
<?php

} else {
    header('Location:..\index.php');
}

?>