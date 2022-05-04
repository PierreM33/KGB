<?php

require_once "header.php";
require_once 'user.php';


if (isConnected()) {


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
                        <div class="bouton2"><a class="selection">Modifier</a></div>
                        <div class="bouton3"><a class="selection">Créer</a></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container6" id="lister">
            <div class="container6-1">
                <!--Affiche le statut administrateur -->
                <div class="blocTitre">
                    <div class="titre">Lister les tables</div>
                </div>

                <div class="blocListe">

                </div>
            </div>
        </section>


        <script src="app.js"></script>
    </body>

    </html>

<?php

} else {
    header("Location: ..\index.php");
}
?>