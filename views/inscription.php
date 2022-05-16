<?php

require_once "header.php";


?>


<section class="container4">
    <div class="container4-1">
        <!-- On affiche les erreurs -->
        <?php if (!empty($_SESSION['error'])) {
            echo $_SESSION['error'];
        } ?>
        <div class="container4-2">
            <div class="blocHaut4-2">
                <div class="inscription4-2">inscription</div>
            </div>
            <form class="blocMilieu4-2" action="..\<?php echo pathPhp(); ?>traitement_inscription.php" method="post">
                <div class="blocIntegreH">
                    <div class="blocInscription4-2">

                        <div class="cadre4-2">
                            <div class="labelTitre">
                                <div class="textLabel">Nom Agent :</div>
                            </div>
                            <div class="labelInput">
                                <div class="inputLabel">
                                    <input class="input" type="text" id="name" name="user_name">
                                </div>
                            </div>

                        </div>
                        <div class="cadre4-2">
                            <div class="labelTitre">
                                <div class="textLabel">Code Agent :</div>
                            </div>
                            <div class="labelInput">
                                <div class="inputLabel">
                                    <input class="input" type="number" id="code" name="code">
                                </div>
                            </div>

                        </div>
                        <div class="cadre4-2">
                            <div class="labelTitre">
                                <div class="textLabel">Password :</div>
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

                        <button class="bouton4" type="submit" value="inscription">Inscription</button>

                    </div>
                </div>
            </form>
        </div>


    </div>

</section>

<script src="app.js"></script>
</body>

</html>