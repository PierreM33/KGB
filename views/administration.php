<?php

require_once "header.php";
require_once 'user.php';


if (isConnected() and $rang >= 2) {




?>
    <html>

    <body>


        <section class="container6">
            <div class="container6-1">
                <!--Affiche le statut administrateur -->
                <div class="blocVide"></div>
                <div class="blocRang">
                    <div class="rang"><?php if ($rang >= 1) {
                                            echo "Administrateur";
                                        } ?></div>
                </div>

                <div class="blocBoutonAdmin">
                    <div class="blocBouton">
                        <div class="bouton1"><a class="selection" href="#lister">Lister</a></div>
                        <div class="bouton2"><a class="selection" href="#edit">Modifier</a></div>
                        <div class="bouton3"><a class="selection" href="#creation">Créer</a></div>

                    </div>
                </div>
            </div>
        </section>

        <!-- LISTER -->
        <section class="container6" id="lister">
            <div class="container6-1">
                <!--Affiche le nom de la table -->
                <div class="blocTitre">
                    <div class="titre">Lister les tables</div>
                </div>

                <div class="blocListe">
                    <?php require_once "listerAdmin.php"; ?>
                </div>
            </div>
        </section>

        <!-- MODIFIER -->
        <section class="container6" id="edit">
            <div class="container6-1">
                <!--Affiche le nom de la table -->
                <div class="blocTitre">
                    <div class="titre">Modifier les tables</div>
                </div>

                <div class="blocListe">
                    <?php require_once "modifierAdmin.php"; ?>
                </div>
            </div>
        </section>

        <!-- CREATION -->
        <section class="container6" id="creation">
            <div class="container6-1">
                <!--Affiche le nom de la table -->
                <div class="blocTitre">
                    <div class="titre">Création</div>
                </div>

                <div class="blocListe">
                    <?php require_once "creationAdmin.php"; ?>
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