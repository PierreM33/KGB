<?php
require_once "header.php";

?>

<body>

    <section class="container1">
        <div class="container1-1">
            <?php
            // Affiche les erreurs diversses
            if (!empty($_SESSION['error'])) {
                echo $_SESSION['error'];
            } ?>
            <div class="container1-2">
                <?php
                //Si le membre est connecté on affiche les boutons
                if (isConnected()) {
                ?><div class="blocBouton">
                        <div class="bouton1"><a class="selection" href="#listeMission">Missions</a></div>
                        <div class="bouton2"><a class="selection">Missions</a></div>
                    </div>
                <?php
                } else { ?>
                    <div class="blocBienvenue">
                        <div class="welcome">Bienvenue, veuillez vous connecter pour accéder aux missions.</div>
                    </div> <?php
                        }
                            ?>

            </div>
        </div>

    </section>
    <!-- PARTIE ACCESSIBLE SEULEMENT SOUS CONNEXION -->
    <?php
    if (isConnected()) {
    ?>
        <section class="container2" id="listeMission">
            <div class="container2-1">

                <div class="blocH">
                    <div class="blocH-1">
                        <div class="titreListeMission">Liste des missions</div>
                    </div>
                </div>
                <div class="blocM">
                    <div class="blocM-1">
                        <div class="tableauMission">

                            <table class="missionListe">
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Spécialité</th>
                                    <th>Début</th>
                                    <th>Fin</th>
                                    <th>Détails</th>
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
                                        <td class="tdStandard"><?php echo $mission['specialite_requis']; ?></td>
                                        <td class="tdStandard"><?php echo $mission['date_debut']; ?></td>
                                        <td class="tdStandard"><?php echo $mission['date_fin']; ?></td>
                                        <td class="tdStandard"><a href="mission.php?id=<?php echo $mission['id']; ?>" class="detail">Détails</a></td>
                                    </tr>

                                <?php  }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    <?php
    }
    ?>
    <script src="app.js"></script>
</body>

</html>