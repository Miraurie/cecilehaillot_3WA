<?php
// Dépendance : Connexion Bdd
require_once '../conf/Database.php';
include '../fct/fct_event.php';

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
    // On récupère les infos de l'évènement
    $query =
        'SELECT 
            id,
            date,
            type,
            place,
            who,
            reservation,
            playlist
        FROM
            events
        WHERE
            id = :id';
    $event = $db->findOne($query, [
           ':id'=>$_GET['id']
        ]);
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
    $file1 = $db->findOne($query0, [
            ':id'=>$_GET['id']
        ]);
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
    $file2 = $db->findOne($query1, [
            ':id'=>$_GET['id']
        ]);
        //Si l'envoi du formulaire est vide
    if (empty($_POST)) {
        // Sélection et affichage du template PHTML.
        $template = 'edit_event';
        include '../layout.phtml';
    } else { // Si le formulaire n'est pas vide
        try {
            // Modification d'un évenement.
            $queryEvmt =
                'UPDATE 
                    events 
                SET 
                    date = :date, 
                    type = :type, 
                    place = :place, 
                    who = :who 
                WHERE
                    id = :id;';
            $db->executeSql($queryEvmt, [
                ':date' => $_POST['date'],
                ':type' => $_POST['type'],
                ':place' => $_POST['place'],
                ':who' => $_POST['who'],
                ':id' => $_GET['id']
            ]);
        } catch (PDOException $e) {
            die;
        }
        // On vérifie si il y a un nouveau fichier
        if ($_FILES['reservation']['name'] !== null) {
            $file = $_FILES;
            // Fonction pour envoyer une image dans ../fct/fct_event.php
            $fResa = uploadResa($file);
            // Modification du fichier dans la table
            $queryFile =
                    "UPDATE files SET title = :title, extension = 'pdf', id_page = 2 WHERE id = :id;";
            $db->executeSql($queryFile, [
                    ':title' => $fResa,
                    ':id' => $file1['id']
            ]);
        }
        // On vérifie si il y a un nouveau fichier
        if ($_FILES['playlist']['name'] !== null) {
            $file = $_FILES;
            $fPlay = uploadPlay($_FILES);
            // Modification du fichier dans la table
            $queryFile =
                    "UPDATE files SET title = :title, extension = 'pdf', id_page = 2 WHERE id = :id;";
            $querySelectFiles = 'SELECT id FROM files';
            $db->executeSql($queryFile, [
                ':title' => $fPlay,
                ':id' => $file2['id']
            ]);
        }
        // Retour à la page d'evenemets une fois que le nouvel evenement a été modifié.
        header('Location: events.php');
        exit();
    }
} else {
    // Si l'utilisateur n'est pas connecté on le renvoie à la page index
    header('Location: ../index.php');
}
