<?php
// Dépendance : Connexion Bdd
require_once 'conf/Database.php';

// Création de l'instance à la bdd
// @TODO optimiser les appels, pour n'avoir qu'une seule instance
$db = new Database();


// Récupération de tous les cours pour les afficher sur la page
$query =
'SELECT
        id,
        city,
        text_card
    FROM
        cours;';

$carte_cours = $db->findAll($query, []);

// On récupère les textes qui doivent s'fficher sur la page
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
    pages.name = "index"
    AND
    texts.id = :id;';
$intro = $db->findOne($query,
[
    ':id' => 9
]
);
$p1 = $db->findOne($query,
[
    ':id' => 1
]
);
$p2 = $db->findOne($query,
[
    ':id' => 2
]
);
$actu = $db->findOne($query, 
[
    ':id' => 0
]);

// On récupère une image liée à la page
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
    pages.name = "index"
    AND
    images.id = :id;';

$imgDiplome = $db->findOne($query,
[
    ':id' => 4   
]
);

// Sélection et affichage du template PHTML.
$template = 'index';
include 'layout.phtml';