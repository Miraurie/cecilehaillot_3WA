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
    // Si l'envoi du formulaire est vide
    if (empty($_POST)) {
        // Récupération de des infos du cours pour faire fonctionner le header.
        $query =
        'SELECT
            id,
            city,
            text_card
        FROM
            cours;';
    
        $carte_cours = $db->findAll($query, []);
        // On récupère la date du jour pour faciliter l'affichage dans le formulaire
        $date = date("Y-m-d");
        // Sélection et affichage du template PHTML.
        $template = 'add_event';
        include '../layout.phtml';
    } else { // Si l'envoi du formulaire n'est pas vide

        // Ajout d'un evenement dans la table events
        try {
            $queryEvmt =
                'INSERT INTO events(DATE, TYPE, place, who)
                VALUES(:date, :type, :place, :who);';
            $db->executeSql($queryEvmt, [
                ':date' => $_POST['date'],
                ':type' => $_POST['type'],
                ':place' => $_POST['place'],
                ':who' => $_POST['who']
            ]);
        } catch (PDOException $e) {
            die;
        }

        // On verifie si l'envoi du fichier est vide
        if ($_FILES['reservation']['name'] !== "") {
            $file = $_FILES;
            // Fonction pour envoyer une image dans ../fct/fct_event.php
            $fResa = uploadResa($file);
            // Requete d'ajout à la table files
            $queryFile =
                "INSERT INTO files(title, extension, id_page)
                VALUES(:title, 'pdf', 2);";
            try {
                $db->executeSql($queryFile, [':title' => $fResa]);
            } catch (PDOException $e) {
                die;
            }
        
            $querySelectFiles =
        'SELECT
            id
        FROM
            files
        ORDER BY
            id ASC;';
            $querySelectEvents =
            'SELECT
            id
        FROM events
        ORDER BY
            id ASC';
            $queryInsertEventR =
            'UPDATE EVENTS
            SET
                reservation = :resa
            WHERE EVENTS
                .id = :event;';

            // On récupère touts les fichiers de la table files
            try {
                $allFiles = $db->findAll($querySelectFiles, []);
            } catch (PDOException $e) {
                die;
            }
            
            // On récupère toutes les evenements de la table events
            try {
                $allEvents = $db->findAll($querySelectEvents, []);
            } catch (PDOException $e) {
                die;
            }

            // On cherche le dernier fichier ajouté
            foreach ($allFiles as $key) {
                $idFiles = $key['id'];
            }

            // On cherche le dernier fichier ajouté
            foreach ($allEvents as $key) {
                $idEvents = $key['id'];
            }

            // On ajoute l'image dans le cours
            try {
                $db->executeSql($queryInsertEventR, [':resa'=>$idFiles, ':event'=>$idEvents]);
            } catch (PDOException $e) {
                die;
            }
        }
        
        // On verifie si l'envoi du fichier est vide
        if ($_FILES['playlist']['name'] !== "") {
            // Fonction pour envoyer une image dans ../fct/fct_event.php
            $fPlay = uploadPlay($file);
            // Requete d'ajout à la table files
            try {
                $db->executeSql($queryFile, [':title' => $fPlay]);
            } catch (PDOException $e) {
                die;
            }

            $queryInsertEventP =
        'UPDATE events
        SET
            playlist = :play
        WHERE events
            .id = :event;';

            // On récupère touts les fichiers de la table files
            try {
                $allFiles = $db->findAll($querySelectFiles, []);
            } catch (PDOException $e) {
                die;
            }
            
            // On récupère toutes les evenements de la table events
            try {
                $allEvents = $db->findAll($querySelectEvents, []);
            } catch (PDOException $e) {
                die;
            }
            
            // On cherche le dernier fichier ajouté
            foreach ($allFiles as $key) {
                $idFiles = $key['id'];
            }

            // On cherche le dernier fichier ajouté
            foreach ($allEvents as $key) {
                $idEvents = $key['id'];
            }

            // On ajoute l'image dans le cours
            try {
                $db->executeSql($queryInsertEventP, [':play'=>$idFiles, ':event'=>$idEvents]);
            } catch (PDOException $e) {
                die;
            }
        }
        
        // Retour à la page d'evenemets une fois que le nouvel evenement a été ajouté.
        header('Location: events.php');
        exit();
    }
} else {
    // Si l'utilisateur n'est pas connecté on le renvoie à la page index
    header('Location: ../index.php');
}
