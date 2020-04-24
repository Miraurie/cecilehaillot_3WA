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
    // Si l'envoi du formulaire est vide
    if (empty($_POST)) {
        // Cette requete est nécessaire pour faire fonctionner le header sur toutes les pages
        $query =
        'SELECT
            id,
            city,
            text_card
        FROM
            cours;';
    
        $carte_cours = $db->findAll($query, []);
        // Sélection et affichage du template PHTML.
        $template = 'add_q';
        include '../layout.phtml';
    } else { // Si l'envoi du formulaire n'est pas vide
        // Ajout d'une question.
        $queryFaq =
            'INSERT INTO faq(
                question,
                answer
            )
            VALUES(
                :question,
                :answer
            );';
        // Ajout d'un cours dans la table cours
        try {
            $db->executeSql($queryFaq, [
                ':question' => $_POST['question'],
                ':answer' => $_POST['answer']
            ]);
        } catch (PDOException $e) {
            die;
        }
        
        // Ajout de l'image
        $file = $_FILES;
        // On verifie si l'envoi de l'image est vide
        if ($file['img']['name'] != null) {
            // Fonction pour envoyer une image dans ../fct/fct_class.php
            $fImg = uploadImg($file);
            // Requete d'ajout à la table Images
            $queryFile =
            "INSERT INTO images(name, extension, alt, id_page)
            VALUES(:name, :ext, :alt, 5);";

            try {
                $db->executeSql($queryFile, [
                ':name' => $fImg['nom'],
                ':ext' => $fImg['ext'],
                ':alt' => $_POST['alt_img']
            ]);
            } catch (PDOException $e) {
                die;
            }
        
            $querySelectFiles =
            'SELECT
                id
            FROM
                images
            ORDER BY
                id ASC;';
            $querySelectFaq =
            'SELECT
                id
            FROM
            faq
            ORDER BY
                id ASC;';
            $queryInsertFaqImg =
            'UPDATE
                faq
            SET
                id_img = :img
            WHERE
                faq.id = :faq;';

            // On récupère toutes les images de la table images
            try {
                $allFiles = $db->findAll($querySelectFiles, []);
            } catch (PDOException $e) {
                die;
            }
        
            // On récupère toutes les cours de la table cours
            try {
                $allFaq = $db->findAll($querySelectFaq, []);
            } catch (PDOException $e) {
                die;
            }
        
            // On cherche la derniere image ajouté
            foreach ($allFiles as $key) {
                $idFiles = $key['id'];
                echo '$idFiles ='.$key['id'].'<br>';
            }

            // On cherche le dernier cours ajouté
            foreach ($allFaq as $key) {
                $idFaq = $key['id'];
            }

            // On ajoute l'image dans le cours
            try {
                $db->executeSql($queryInsertFaqImg, [':img'=>$idFiles, ':faq'=>$idFaq]);
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
