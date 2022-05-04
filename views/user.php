<?php

if (isConnected()) {
    $sessionId = $_SESSION['id'];

    //RECUPERATION DU JOUEUR
    $membre = $bdd->prepare('SELECT * FROM users WHERE id = :id');
    $membre->bindValue('id', $sessionId);
    $membre->execute();
    $M = $membre->fetch(PDO::FETCH_ASSOC);

    $rang = $M['rang'];
} else {
    $sessionId = 0;
    $rang = 0;
}
