<?php

require_once "connexion_bdd.php";


$getId = strip_tags(htmlspecialchars($_GET['id']));

//Recupère l'id de la mission choisie
$mission = $bdd->prepare('SELECT * FROM mission WHERE id = :id');
$mission->bindValue('id', $getId);
$mission->execute();
$Miss = $mission->fetch();



$categorieAgent = "agent";

//AGENT
$membreAgent = $bdd->prepare('SELECT * FROM membre WHERE mission_attribue = :mission_attribue AND categorie = :categorie');
$membreAgent->bindValue('mission_attribue', $getId);
$membreAgent->bindValue('categorie', $categorieAgent);
$membreAgent->execute();

$categorieCible = "cible";

//CIBLE
$membreCible = $bdd->prepare('SELECT * FROM membre WHERE mission_attribue = :mission_attribue AND categorie = :categorie');
$membreCible->bindValue('mission_attribue', $getId);
$membreCible->bindValue('categorie', $categorieCible);
$membreCible->execute();


$categorieContact = "contact";

//CONTACT
$membreContact = $bdd->prepare('SELECT * FROM membre WHERE mission_attribue = :mission_attribue AND categorie = :categorie');
$membreContact->bindValue('mission_attribue', $getId);
$membreContact->bindValue('categorie', $categorieContact);
$membreContact->execute();


$planque = $bdd->prepare('SELECT * FROM planque WHERE mission_attribue = :mission_attribue');
$planque->bindValue('mission_attribue', $getId);
$planque->execute();

//USER
$U = $bdd->prepare('SELECT * FROM users WHERE id = :id');
$U->bindValue('id', $getId);
$U->execute();
$user = $U->fetch();
