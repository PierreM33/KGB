<?php
$sessionName = $_SESSION['creation_select'];
if (isConnected() and $rang >= 2) {

?>

    <!-- UTILISE UNE FONCTION JAVA POUR SELECTIONNER LA TABLE --->
    <div class="blocAdminHaut">
        <form method="post" action="..\<?php echo pathPhp(); ?>creationSelect.php">
            <select class="select" id="select" name="select">
                <option value="mission" name="mission" selected>Missions</option>
                <option value="planque" name="planque">Planques</option>
                <option value="agent" name="agent">Agents</option>
                <option value="cible" name="cible">Cibles</option>
                <option value="contact" name="contact">Contacts</option>
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
                //
                require_once "membreCreation.php";
                //
            } elseif ($sessionName == "mission") {
                //
                require_once "missionCreationPage1.php";
                //

            } elseif ($sessionName == "cible") {
                //
                require_once "membreCreation.php";
                //
            } elseif ($sessionName == "contact") {
                //
                require_once "membreCreation.php";
                //
            } elseif ($sessionName == "planque") {
                //
                require_once "planqueCreation.php";
                //


            } elseif ($sessionName == "user") {
            ?>


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