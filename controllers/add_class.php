<?php
// Dépendance : Connexion Bdd
require_once '../conf/Database.php';
include '../fct/fct_class.php';

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
        $template = 'add_class';
        include '../layout.phtml';
    } else { // Si l'envoi du formulaire n'est pas vide
        // Ajout d'un cours.
        $queryClass =
            'INSERT INTO cours(
                city,
                day,
                adress,
                info,
                text_card
            )
            VALUES(
                :city,
                :day,
                :adress,
                :info,
                :text_card
            );';
        // Ajout d'un cours dans la table cours
        try {
            $db->executeSql($queryClass, [
                ':city' => $_POST['city'],
                ':day' => $_POST['day'],
                ':adress' => $_POST['adress'],
                ':info' => $_POST['info'],
                ':text_card' => $_POST['text_card']
            ]);
        } catch (PDOException $e) {
            die;
        }
        // Ajout des horaires
        $queryTime =
        'INSERT INTO time(hour, level, descr)
        VALUES(
            :hour,
            :lvl,
            :descr
        )';
        if ($_POST['hour_1'] !== "") {
            // Ajout Horaire 1 dans la table Time
            try {
                $db->executeSql($queryTime, [
                ':hour' => $_POST['hour_1'].':00',
                ':lvl' => $_POST['hour_1_lvl'],
                ':descr' => $_POST['hour_1_info']
            ]);
            } catch (PDOException $e) {
                die;
            }

            // Insertion Horaire 1 dans le cours
            $querySelectTime =
            'SELECT
                id
            FROM
                time
                ORDER BY id ASC;';
            $querySelectClass =
            'SELECT
                id
            FROM
                cours
            ORDER BY
                id ASC;';
            $queryInsertClassTime =
            'UPDATE
                cours
            SET
                hour_1 = :hour
            WHERE
                cours.id = :cours;';

            // On récupère toutes les horaires de la table time
            try {
                $allTimes = $db->findAll($querySelectTime, []);
            } catch (PDOException $e) {
                die;
            }
        
            // On récupère touts les cours de la table cours
            try {
                $allClass = $db->findAll($querySelectClass, []);
            } catch (PDOException $e) {
                die;
            }

            // On cherche le dernier horaire ajouté
            foreach ($allTimes as $key) {
                $idTime = $key['id'];
            }

            // On cherche le dernier cours ajouté
            foreach ($allClass as $key) {
                $idClass = $key['id'];
            }

            // On ajoute l'horaire dans le cours
            try {
                $db->executeSql($queryInsertClassTime, [':hour'=>$idTime, ':cours'=>$idClass]);
            } catch (PDOException $e) {
                die;
            }
        }

        if ($_POST['hour_2'] === "") {
        } else {
            // Ajout Horaire 2 dans la table Time
            try {
                $db->executeSql($queryTime, [
                ':hour' => $_POST['hour_2'].':00',
                ':lvl' => $_POST['hour_2_lvl'],
                ':descr' => $_POST['hour_2_info']
            ]);
            } catch (PDOException $e) {
                die;
            }

            // Insertion Horaire 1 dans le cours
            $querySelectTime =
            'SELECT
                id
            FROM
                time
            ORDER BY
                id ASC;';
            $querySelectClass =
            'SELECT
                id
            FROM
                cours
            ORDER BY
                id ASC;';
            $queryInsertClassTime =
            'UPDATE
                cours
            SET
                hour_2 = :hour
            WHERE
                cours.id = :cours;';

            // On récupère toutes les horaires de la table time
            try {
                $allTimes = $db->findAll($querySelectTime, []);
            } catch (PDOException $e) {
                die;
            }
            
            // On récupère touts les cours de la table cours
            try {
                $allClass = $db->findAll($querySelectClass, []);
            } catch (PDOException $e) {
                die;
            }
        
            // On cherche le dernier horaire ajouté
            foreach ($allTimes as $key) {
                $idTime = $key['id'];
            }

            // On cherche le dernier cours ajouté
            foreach ($allClass as $key) {
                $idClass = $key['id'];
            }

            // On ajoute l'horaire dans le cours
            try {
                $db->executeSql($queryInsertClassTime, [':hour'=>$idTime, ':cours'=>$idClass]);
            } catch (PDOException $e) {
                die;
            }
        }

        if ($_POST['hour_3'] === "") {
        } else {
            // Ajout Horaire 3 dans la table Time
            try {
                $db->executeSql($queryTime, [
                ':hour' => $_POST['hour_3'].':00',
                ':lvl' => $_POST['hour_3_lvl'],
                ':descr' => $_POST['hour_3_info']
            ]);
            } catch (PDOException $e) {
                die;
            }

            // Insertion Horaire 3 dans le cours
            $querySelectTime =
            'SELECT
                id
            FROM
                time;';
            $querySelectClass =
            'SELECT
                id
            FROM
                cours
            ORDER BY
                id ASC;';
            $queryInsertClassTime =
            'UPDATE
                cours
            SET
                hour_3 = :hour
            WHERE
                cours.id = :cours;';

            // On récupère toutes les horaires de la table time
            try {
                $allTimes = $db->findAll($querySelectTime, []);
            } catch (PDOException $e) {
                die;
            }
            
            // On récupère touts les cours de la table cours
            try {
                $allClass = $db->findAll($querySelectClass, []);
            } catch (PDOException $e) {
                die;
            }
        
            // On cherche le dernier horaire ajouté
            foreach ($allTimes as $key) {
                $idTime = $key['id'];
            }

            // On cherche le dernier cours ajouté
            foreach ($allClass as $key) {
                $idClass = $key['id'];
            }

            // On ajoute l'horaire dans le cours
            try {
                $db->executeSql($queryInsertClassTime, [':hour'=>$idTime, ':cours'=>$idClass]);
            } catch (PDOException $e) {
                die;
            }
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
            VALUES(:name, :ext, :alt, 1);";

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
                images;';
            $querySelectClass =
            'SELECT
                id
            FROM
                cours
            ORDER BY
                id ASC;';
            $queryInsertClassImg =
            'UPDATE
                cours
            SET
                id_img = :img
            WHERE
                cours.id = :cours;';

            // On récupère toutes les images de la table images
            try {
                $allFiles = $db->findAll($querySelectFiles, []);
            } catch (PDOException $e) {
                die;
            }
        
            // On récupère toutes les cours de la table cours
            try {
                $allClass = $db->findAll($querySelectClass, []);
            } catch (PDOException $e) {
                die;
            }
        
            // On cherche la derniere image ajouté
            foreach ($allFiles as $key) {
                $idFiles = $key['id'];
            }

            // On cherche le dernier cours ajouté
            foreach ($allClass as $key) {
                $idClass = $key['id'];
            }

            // On ajoute l'image dans le cours
            try {
                $db->executeSql($queryInsertClassImg, [':img'=>$idFiles, ':cours'=>$idClass]);
            } catch (PDOException $e) {
                die;
            }
        }
        // Retour à la page d'accueil une fois que le nouveau cours a été ajouté.
        header('Location: ../index.php');
        exit();
    }
} else {
    // Si l'utilisateur n'est pas connecté on le renvoie à la page index
    header('Location: ../index.php');
}
