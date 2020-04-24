<?php 
// Dépendance : Connexion Bdd
require_once '../conf/Database.php';
$db = new Database();

// Cette requete est nécessaire pour faire fonctionner le header sur toutes les pages
$query =
'SELECT
        id,
        city,
        text_card
    FROM
        cours;';

$carte_cours = $db->findAll($query, []);
// Validation de la query string dans l'URL.
if (array_key_exists('id', $_GET) or ctype_digit($_GET['id'])) {
    // Détruire la session qui contient les infos user
    // On la récupère
    session_start();
	session_destroy();
}

header('Location: ../index.php');
exit();
