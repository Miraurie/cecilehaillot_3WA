<?php
// Dépendance : Connexion Bdd
require_once '../conf/Database.php';
// Init session
if (session_status() == PHP_SESSION_NONE) {
    // Démarrage du module PHP de gestion des sessions.
    // Ce qui donne accès à $_SESSION
    session_start();
}
// On vérifie si l'utilisateur est connecté
if (!empty($_SESSION) and array_key_exists('users', $_SESSION)) {
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
    // Cette requete permet d'avoir toutes les pages pour les afficher
    $query =
    'SELECT
            id,
            label
        FROM
            pages
        WHERE
        id <> 1
        AND
        id <> 6
        AND
        id <> 7;';
    $pages = $db->findAll($query, []);
    // Sélection et affichage du template PHTML.
    $template = 'admin';
    include '../layout.phtml';
} else {
    // Si l'utilisateur n'est pas connecté on le renvoie à la page index
    header('Location: ../index.php');
}
