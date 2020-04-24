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

// On récupère le contenu de la table faq
$query=
'SELECT
        *
    FROM
        faq;
';

$faqs = $db->findAll($query, []);

// On récupère les images de la table images liées à faq
$query_img =
'SELECT faq.id,
    images.name, 
    images.extension, 
    images.alt
FROM faq
    INNER JOIN
        images
    ON
        faq.id_img = images.id

    WHERE
        faq.id = :id;
';
// Cette variable permet de changer la classe des images sur le PHMTL
$float = "f_left";
    // Sélection et affichage du template PHTML.
    $template = 'faq';
    include '../layout.phtml';