<div class="blocEdition">
    <div class="blocEditionCentre"><?php if (!empty($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                    } ?>
        <div class="titreEdit">Création de l'agent</div>
        <form method="post" action="..\<?php echo pathPhp(); ?>traitement_creationMembre.php">
            <input class="select" type="text" name="nom" placeholder="Nom">
            <input class="select" type="text" name="prenom" placeholder="Prénom">
            <input class="select" type="date" name="naissance" placeholder="01/01/2022">
            <input class="select" type="text" name="pays" placeholder="Nationalite">
            <input class="select" type="number" name="code" placeholder="0000">
            <select class="select" id="specialite" name="specialite">
                <option value="discretion" name="discretion" selected>Discretion</option>
                <option value="sniper" name="sniper">Sniper</option>
                <option value="hack" name="hack">Hack</option>
                <option value="surveillance" name="surveillance">Surveillance</option>
                <option value="infiltration" name="infiltration">Infiltration</option>
            </select>
            <select class="select" id="select" name="categorie">
                <option value="agent" name="agent" selected>Agent</option>
                <option value="cible" name="cible">Cible</option>
                <option value="contact" name="contact">Contact</option>
            </select>
            <br>
            <input type="submit" class="submit" value="Ajouter" />
        </form>
    </div>
</div>