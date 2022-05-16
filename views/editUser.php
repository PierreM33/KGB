<?php


require_once "header.php";
require_once "..\includes/variable.php";

if (isConnected()) {


?>
    <html>

    <body>


        <section class="container5">
            <div class="container5-1">
                <div class="vide"></div>
                <div class="containerTitreBackground">Vous editez le rang du membre : - <?php echo $user['nom']; ?> - ID : <?php echo $user['id']; ?></div>
                <div class="blocEdition">
                    <div class="blocEditionCentre">
                        <div class="titreEdit">Entrez un numéro entre 1 et 2</div>
                        <form method="post" action="..\<?php echo pathPhp(); ?>editRangUser.php">
                            <input class="select" type="number" name="numero" required min="1" max="2" size="10">
                            <input type="hidden" name="cache" value="<?php echo $user['id'] ?>">
                            <input type="submit" class="submit" value="Modifier" />
                        </form>
                        <p>Droit d'administration : Rang 2</br>
                            Droit utilisateur : Rang 1</p>

                        <div class="titreEdit">
                            <a class="missionCreation" href="administration.php#edit">Retour au panneau administration</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>

    </html>

<?php

} else {
    header("Location: ..\index.php");
}
?>