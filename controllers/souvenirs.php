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

// On récupère les images liés à la page
$query =
'SELECT
        images.id,
        images.name,
        extension,
        alt,
        id_page
    FROM
        images
    INNER JOIN
        pages
    ON
        id_page = pages.id
    WHERE
    pages.name = "souvenirs"';

$imgs = $db->findAll($query, []);

// Sélection et affichage du template PHTML.
$template = 'souvenirs';
include '../layout.phtml';