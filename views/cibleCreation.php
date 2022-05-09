<div class="blocEdition">
    <div class="blocEditionCentre"><?php if (!empty($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                    } ?>
        <div class="titreEdit">Création de l'agent</div>
        <form method="post" action="..\<?php echo pathPhp(); ?>traitement_creationCible.php">
            <input class="select" type="text" name="nom" placeholder="Nom">
            <input class="select" type="text" name="prenom" placeholder="Prénom">
            <input class="select" type="date" name="naissance" placeholder="01/01/0/1">
            <input class="select" type="text" name="pays" placeholder="Nationalite">
            <input class="select" type="number" name="code" placeholder="0000">
            <input class="select" type="number" name="mission" placeholder="Numéro de mission attribué">
            <br>
            <input type="submit" class="submit" value="Ajouter Cible" />
        </form>
    </div>
</div>