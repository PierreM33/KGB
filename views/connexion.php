<?php

require_once "header.php";

if (isConnected()) {
    header('Location:..\index.php');
}
?>
<!-- PARTIE CONNEXION -->

<section class="container5">
    <div class="container5-1">
        <!-- On affiche les erreurs -->
        <?php if (!empty($_SESSION['error'])) {
            echo $_SESSION['error'];
        } ?>
        <div class="container5-2">
            <div class="blocHaut4-2">
                <div class="inscription4-2">connexion</div>
            </div>
            <form class="blocMilieu4-2" action="..\<?php echo pathPhp(); ?>traitement_connexion.php" method="post">
                <div class="blocIntegreH">
                    <div class="blocInscription4-2">

                        <div class="cadre4-2">
                            <div class="labelTitre">
                                <div class="textLabel">Nom Agent :</div>
                            </div>
                            <div class="labelInput">
                                <div class="inputLabel">
                                    <input class="input" type="text" id="nom" name="nom">
                                </div>
                            </div>

                        </div>
                        <div class="cadre4-2">
                            <div class="labelTitre">
                                <div class="textLabel">Prénom Agent :</div>
                            </div>
                            <div class="labelInput">
                                <div class="inputLabel">
                                    <input class="input" type="text" id="prenom" name="prenom">
                                </div>
                            </div>

                        </div>
                        <div class="cadre4-2">
                            <div class="labelTitre">
                                <div class="textLabel">Password:</div>
                            </div>
                            <div class="labelInput">
                                <div class="inputLabel">
                                    <input class="input" type="password" id="password" name="password">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="blocIntegreB">
                    <div class="bouton4-2">

                        <button class="bouton4" type="submit" value="connexion">Connexion</button>

                    </div>
                </div>
            </form>
        </div>


    </div>

</section>

<script src="app.js"></script>
</body>

</html>