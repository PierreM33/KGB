<?php

require_once "connexion_bdd.php";


//Recupère l'id de la mission choisie
$mission = $bdd->prepare('SELECT * FROM mission WHERE id = ?');
$mission->execute(array($_GET['id']));
$Miss = $mission->fetch();


//On récupère la liste dans le tableau du champs de la BDD
$liste =  json_decode($Miss['agent_participe'], true);



//Agent
$LA = $bdd->prepare('SELECT * FROM agent WHERE mission_attribue = ?');
$LA->execute(array($_GET['id']));

//Cible
$C = $bdd->prepare('SELECT * FROM cible WHERE mission_attribue = ?');
$C->execute(array($_GET['id']));

//Contact
$Contact = $bdd->prepare('SELECT * FROM contact WHERE mission_attribue = ?');
$Contact->execute(array($_GET['id']));

//Planque
$P = $bdd->prepare('SELECT * FROM planque WHERE mission_attribue = ?');
$P->execute(array($_GET['id']));
