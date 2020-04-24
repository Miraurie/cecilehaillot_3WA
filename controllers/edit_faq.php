<?php
// Dépendance : Connexion Bdd
require_once '../conf/Database.php';
include '../fct/fct_faq.php';

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

    // On récupère les infos de la question
    $queryQ =
    'SELECT
        question,
        answer,
        id_img
    FROM
        faq
    WHERE
        id = :id;';
    $faq = $db->findOne($queryQ, [':id' => $_GET['id']]);

    // On récupère les infos du fichier de l'image de la question
    $query_img =
    'SELECT faq.id,
        images.name, 
        images.extension, 
        images.alt
    FROM
        faq
    INNER JOIN
        images
    ON
        faq.id_img = images.id

    WHERE
        faq.id = :id;';
    $img = $db->findOne($query_img, [':id' => $_GET['id']]);
    //Si l'envoi du formulaire est vide
    if (empty($_POST)) {
        // Sélection et affichage du template PHTML
        $template = 'edit_faq';
        include '../layout.phtml';
    } else { // Si le formulaire n'est pas vide
        try {
            // Modification d'une question
            $queryEvmt =
                'UPDATE 
                    faq 
                SET 
                    question = :question, 
                    ansswer = :answer,
                WHERE
                    id = :id;';
            $db->executeSql($queryEvmt, [
                ':question' => $_POST['question'],
                ':answer' => $_POST['answer'],
                ':id' => $_GET['id']
            ]);
        } catch (PDOException $e) {
            die;
        }
        // Ajout de l'image
        $file = $_FILES;
        // On vérifie si il y a un nouveau fichier
        if ($file['img']['name'] != null) {
            // Fonction pour envoyer une image dans ../fct/fct_faq.php
            $fImg = uploadImg($file);
            $queryFile =
            "UPDATE images SET name = :name, extesion = :ext, alt = :alt, id_page = 5 WHERE id = :id;";

            try {
                $db->executeSql($queryFile, [
                ':name' => $fImg['nom'],
                ':ext' => $fImg['ext'],
                ':alt' => $_POST['alt_img'],
                ':id' => $faq['id_img']
            ]);
            } catch (PDOException $e) {
                die;
            }
        }
        // Retour à la page d'accueil une fois que la question a été ajouté.
        header('Location: faq.php');
        exit();
    }
} else {
    // Si l'utilisateur n'est pas connecté on le renvoie à la page index
    header('Location: ../index.php');
}
