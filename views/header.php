<?php
require_once "..\includes/connexion_bdd.php";

//VERIFICATION SI SESSION VAUT NULL
if (isConnected()) {

    require_once 'user.php';
} else {
    $sessionId = 0;
    $rang = 0;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\<?php echo pathCss(); ?>style.css" />
</head>


<header>
    <nav>
        <div class="logo">
            <i class="fa-brands fa-markdown"></i>
            <div class="titre">Missions</div>
        </div>
        <div class="toggle">
            <i class="fas fa-bars ouvrir"></i>
            <i class="fas fa-times fermer"></i>
        </div>
        <ul class="menu">
            <li><a class="lienMenu" href="..\index.php">Home</a></li>
            <li><a class="lienMenu" href="inscription.php">Inscription</a></li>
            <?php
            if ($sessionId != NULL) { ?><li><a class="lienMenu" href="..\<?php echo pathPhp(); ?>deconnexion.php">Déconnexion</a></li>
            <?php
            } else {
            ?>
                <li><a class="lienMenu" href="connexion.php">Connexion</a></li>
            <?php
            }
            if ($rang >= 1) { ?><li><a class="lienMenu" href="administration.php">Administration</a></li>
            <?php
            } else {
            ?><li><a class="lienMenu" href=""></a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
</header>