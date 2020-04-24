<?php
include '../fct/fct_strpos.php';
// Dépendance : Connexion Bdd
require_once '../conf/Database.php';
$db = new Database();

// Init session
if (session_status() == PHP_SESSION_NONE) {
    // Démarrage du module PHP de gestion des sessions.
    // Ce qui donne accès à $_SESSION
    session_start();
}
// On vérifie si l'utilisateur est connecté
if (!empty($_SESSION) and array_key_exists('users', $_SESSION)) {
    // Cette requete est nécessaire pour faire fonctionner le header sur toutes les pages
    $query =
    'SELECT
        id,
        city,
        text_card
    FROM
        cours;';

    $carte_cours = $db->findAll($query, []);
    //Si l'envoi du formulaire est vide
    if (empty($_POST)) {
        // On récupère les infos de la page, texte et liens
        $queryPage =
        'SELECT * FROM pages WHERE id = :id;';
        $page = $db->findOne($queryPage, [':id' => $_GET['id']]);
        $queryTxt =
        'SELECT id, contents, id_pages FROM texts WHERE id_pages = :id';
        $texts = $db->findAll($queryTxt, [':id' => $_GET['id']]);
        $queryLink =
        'SELECT id, src, id_page FROM links WHERE id_page = :id';
        $links = $db->findAll($queryLink, [':id' => $_GET['id']]);

        // Sélection et affichage du template PHTML.
        $template = 'edit_page';
        include '../layout.phtml';
    } else { // Si le formulaire n'est pas vide
        // Pour chaque valeur envoyée
        foreach ($_POST as $key => $value) {
            // On verifie si le nom de l'entrée contient "link"
            if (strpos($key, 'link') !== false) {
                // On change le contenu dans la table link
                $query =
                'UPDATE links SET src = :src WHERE id = :id;';
                $a = after_last('_', $key);
                $b = $value;
                try {
                    $db->executeSql($query, [':src' => $b, ':id' => $a]);
                } catch (PDOException $e) {
                    die;
                }
                // On verifie si le nom de l'entrée contient "text"
            } elseif (strpos($key, 'text') !== false) {
                // On change le contenu dans la table texts
                $query =
                'UPDATE texts SET contents = :contents WHERE id = :id;';
                $a = after_last('_', $key);
                $b = $value;
                try {
                    $db->executeSql($query, [':contents' => $b, ':id' => $a]);
                } catch (PDOException $e) {
                    die;
                }
            }
        }
        //On renvoie l'utilisateur sur la page admin une fois que la modification est faite
        header('Location: admin.php');
        exit();
    }
} else {
    header('Location: ../index.php');
    //$template = 'index';
}
