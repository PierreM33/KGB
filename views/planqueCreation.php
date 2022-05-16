<div class="blocEdition">
    <div class="blocEditionCentre"><?php if (!empty($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                    } ?>
        <div class="titreEdit">Création de l'agent</div>
        <form method="post" action="..\<?php echo pathPhp(); ?>traitement_creationPlanque.php">
            <input class="select" type="text" name="adresse" placeholder="Adresse">
            <input class="select" type="text" name="pays" placeholder="Nationalite">
            <input class="select" type="number" name="type" min="0" placeholder="type">
            <input class="select" type="number" name="code" min="0" placeholder="0000">
            <br>
            <input type="submit" class="submit" value="Ajouter Planque" />
        </form>
    </div>
</div>