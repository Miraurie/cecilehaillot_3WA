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
// Cette requete permet d'avoir le cours  basé sur l'id envoyé par le lien pour l'afficher
$query =
'SELECT cours.id, 
    city, 
    adress, 
    day, 
    info, 
    text_card, 
    id_img, 
    images.name, 
    images.extension, 
    images.alt
FROM cours
    INNER JOIN
        images
    ON
        cours.id_img = images.id

    WHERE
        cours.id = :id;
';
$cour = $db->findOne(
    $query,
    [
        ':id' => $_GET['id']
    ]
);
// Cette requete permet d'afficher l'horaire 1 sur la page
$query =
'SELECT hour_1,
    time1.id,
    time1.hour,
    time1.level,
    time1.descr
FROM cours
    INNER JOIN
        time time1
    ON 
        cours.hour_1 = time1.id
    WHERE
        cours.id = :id;

';
$time1 = $db->findOne(
    $query,
    [
    ':id' => $_GET['id']
]
);

// On fait en sorte que le rendu n'affiche pas les secondes stockées dans la base
$time1['hour'] =substr($time1['hour'], 0, 5);

// Cette requete permet d'afficher l'horaire 2 sur la page
$query =
'SELECT hour_2,
    time2.id,
    time2.hour,
    time2.level,
    time2.descr
FROM cours
    INNER JOIN
        time time2
    ON 
        cours.hour_2 = time2.id
    WHERE
        cours.id = :id;

';
$time2 = $db->findOne(
    $query,
    [
    ':id' => $_GET['id']
]
);

// On fait en sorte que le rendu n'affiche pas les secondes stockées dans la base
$time2['hour'] =substr($time2['hour'], 0, 5);

// Cette requete permet d'afficher l'horaire 3 sur la page
$query =
'SELECT hour_3,
    time3.id,
    time3.hour,
    time3.level,
    time3.descr
FROM cours
    INNER JOIN
        time time3
    ON 
        cours.hour_3 = time3.id
    WHERE
        cours.id = :id;

';
$time3 = $db->findOne(
    $query,
    [
    ':id' => $_GET['id']
]
);

// On fait en sorte que le rendu n'affiche pas les secondes stockées dans la base
$time3['hour'] =substr($time3['hour'], 0, 5);

// Sélection et affichage du template PHTML.
$template = 'classes';
include '../layout.phtml';
