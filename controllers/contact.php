<?php
// Dépendance : Connexion Bdd
require_once '../conf/Database.php';
$db = new Database();

// Récupération de des infos du cours pour faire fonctionner le header.
$query =
'SELECT
        id,
        city,
        text_card
    FROM
        cours;';

    $carte_cours = $db->findAll($query, []);

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
    pages.name = "contact"
    AND
    images.id = :id;';

    $img = $db->findOne(
        $query,
        [
    ':id' => 10
]
    );
if (empty($_POST)) {
    $sent = '';
} else {
    $to = 'laurie.haillot@gmail.com';
    $subject = $_POST['sujet'];
    $message = $_POST['msg'];
    $from = 'From : '.$_POST['mail'];
    $retour = mail($to, $subject, $message, $from);
    // Si la fonction mail s'effectue
    if ($retour) {
        $sent = "<p>Votre message a bien été envoyé.</p>";
    } else {
        $sent = "<p> une erreur s'est produite, veuillez reessayer.</p>";
    }
}
// Sélection et affichage du template PHTML.
$template = 'contact';
include '../layout.phtml';
