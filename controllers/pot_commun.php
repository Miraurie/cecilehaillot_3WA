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
// On récupère les infos de la page, texte , liens et image
$query =
'SELECT
        texts.id,
        contents,
        id_pages
    FROM
        texts
    INNER JOIN
        pages
    ON
        id_pages = pages.id
    WHERE
    pages.name = "pot_commun"
    AND
    texts.id = :id;';
$potC = $db->findOne($query,
[
    ':id' => 3
]
);

$query =
'SELECT
        links.id,
        src,
        id_page
    FROM
        links
    INNER JOIN
        pages
    ON
        id_page = pages.id
    WHERE
    pages.name = "pot_commun";';

$potClinks = $db->findAll($query);

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
    pages.name = "pot_commun"
    AND
    images.id = :id;';

$img = $db->findOne($query,
[
    ':id' => 6 
]
);


// Sélection et affichage du template PHTML.
$template = 'pot_commun';
include '../layout.phtml';