<?php
require_once "header.php";



//

?>

<html>

<body>
    <div class="container6">
        <div class="container6-1">
            <div class="blocEdition">
                <div class="blocEditionCentre"><?php /* if (!empty($_SESSION['error'])) {
                                                    echo $_SESSION['error'];
                                                } */ ?>

                    <form method="post" action="..\<?php echo pathPhp(); ?>traitement_creationMission.php">
                        <input class="select" type="text" name="nom" placeholder="Nom">
                        <input class="select" type="textarea" name="description" placeholder="Description">
                        <input class="select" type="text" name="pays" placeholder="Pays Mission">
                        <input class="select" type="text" name="type" placeholder="Type">
                        <input class="select" type="number" name="code" placeholder="Code">
                        <input class="select" type="date" name="debut" placeholder="01/01/2022">
                        <input class="select" type="date" name="fin" placeholder="01/01/2022">
                        <select class="select" id="specialite" name="specialite">
                            <option value="discretion" name="discretion" selected>Discretion</option>
                            <option value="sniper" name="sniper">Sniper</option>
                            <option value="hack" name="hack">Hack</option>
                            <option value="surveillance" name="surveillance">Surveillance</option>
                            <option value="infiltration" name="infiltration">Infiltration</option>
                        </select>
                        <select class="select" id="statut" name="statut">
                            <option value="preparation" name="preparation" selected>Préparation</option>
                            <option value="cours" name="cours">En cours</option>
                            <option value="echec" name="echec">Echec</option>
                            <option value="termine" name="termine">Terminé</option>
                        </select>

                        <br><br>
                        <input type="submit" class="submit" value="Valider" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>