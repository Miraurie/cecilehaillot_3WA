<?php
// Dépendance : Connexion Bdd
require_once '../conf/Database.php';
$db = new Database();

// Cette requete est nécessaire pour faire fonctionner le header sur toutes les pages
$query =
'SELECT
        cours.id,
        city,
        text_card
    FROM
        cours;';

$carte_cours = $db->findAll($query, []);

    // On récupère les infos de l'évènement
$query =
'SELECT
        *
    FROM
        events;';
$events = $db -> findAll($query, []);

// On récupère les infos du fichier de reservation de l'évènement
$query0 =
'SELECT
        events.id,
        events.reservation,
        files.title,
        files.extension
    FROM
        events
    INNER JOIN
        files
    ON
        events.reservation=files.id
    WHERE
        events.id = :id;';


// On récupère les infos du fichier de playlist de l'évènement
$query1 =
'SELECT
        events.id,
        events.playlist,
        files.title,
        files.extension
    FROM
        events
    INNER JOIN
        files
    ON
        events.playlist=files.id
    WHERE
        events.id = :id;';


// On récupère les infos de l'image de la page évènement
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
    pages.name = "events"
    AND
    images.id = :id;';

$imgEvent = $db->findOne(
    $query,
    [
    ':id' => 5
]
);

// On récupère les infos des liens de la page évènement
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
    pages.name = "events"
    AND
    links.id = :id;';

$link1 = $db->findOne(
    $query,
    [
    ':id'=> 1
]
);
$link2 = $db->findOne(
    $query,
    [
    ':id'=> 2
]
);
$link3 = $db->findOne(
    $query,
    [
    ':id'=> 3
]
);
$link4 = $db->findOne(
    $query,
    [
    ':id'=> 4
]
);

// Récupération de des textes du la page
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
    pages.name = "events"
    AND
    texts.id = :id;';

$text1 = $db->findOne(
    $query,
    [
    ':id'=> 5
    ]
);
$text2 = $db->findOne(
    $query,
    [
    ':id'=> 6
    ]
);
$text3 = $db->findOne(
    $query,
    [
    ':id'=> 7
    ]
);

// Sélection et affichage du template PHTML.
$template = 'events';
include '../layout.phtml';
