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
    // Cette requete est nécessaire pour faire fonctionner le header sur toutes les pages
    $query =
        'SELECT
            id,
            city,
            text_card
        FROM
            cours;';
    
    $carte_cours = $db->findAll($query, []);
    // On récupère l'horaire 1 du cours
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
        cours.id = :id;';
    $time1 = $db->findOne($query, [':id' => $_GET['id']]);
    $time1['hour'] =substr($time1['hour'], 0, 5);

    // On récupère l'horaire2 du cours
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
        cours.id = :id;';

    $time2 = $db->findOne($query, [':id' => $_GET['id']]);

    $time2['hour'] =substr($time2['hour'], 0, 5);

    // On récupère l'horaire3 du cours
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
        cours.id = :id;';

    $time3 = $db->findOne($query, [':id' => $_GET['id']]);

    $time3['hour'] = substr($time3['hour'], 0, 5);
    if (empty($_POST)) {
        // Récupération d'un cours.
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
                cours.id = :id;';
        $cour = $db->findOne($query, [':id' => $_GET['id']]);

        
        // Sélection et affichage du template PHTML.
        $template = 'edit_class';
        include '../layout.phtml';
    } else {
        // Ajout d'un cours.
        $queryClass =
            'UPDATE cours
            SET
                city = :city,
                day = :day,
                adress = :adress,
                info = :info,
                text_card = :text_card
            WHERE
                id = :id;);';
        try {
            $db->executeSql($queryClass, [
                ':city' => $_POST['city'],
                ':day' => $_POST['day'],
                ':adress' => $_POST['adress'],
                ':info' => $_POST['info'],
                ':text_card' => $_POST['text_card'],
                ':id' => $_GET['id']
            ]);
        } catch (PDOException $e) {
            die;
        }
        // On verifie si $_post est vide et si la valeur hour_1 n'est pas vide
        if ($time1['hour'] == '' && $_POST['hour_1'] !== '') {
            $queryTime =
            'INSERT INTO time(hour, level, descr)
            VALUES(
                :hour,
                :lvl,
                :descr)';
                
            // Ajout Horaire 2 dans la table Time
            try {
                $db->executeSql($queryTime, [
                ':hour' => $_POST['hour_1'].':00',
                ':lvl' => $_POST['hour_1_lvl'],
                ':descr' => $_POST['hour_1_info']
            ]);
            } catch (PDOException $e) {
                die;
            }
            

            // Insertion Horaire 2 dans le cours
            $querySelectTime =
            'SELECT
                id
            FROM
                time;';
            $queryInsertClassTime =
            'UPDATE
                cours
            SET
                hour_1 = :hour
            WHERE
                cours.id = :cours;';

            try {
                $allTimes = $db->findAll($querySelectTime, []);
            } catch (PDOException $e) {
                die;
            }
            foreach ($allTimes as $key) {
                $idTime = $key['id'];
            }

            try {
                $db->executeSql($queryInsertClassTime, [':hour'=>$idTime, ':cours'=>$_GET['id']]);
            } catch (PDOException $e) {
                die;
            }
        }
        // On verifie si $_post est vide et si la valeur hour_1 n'est pas vide
        if ($time2['hour'] == '' && $_POST['hour_2'] !== '') {
            $queryTime =
            'INSERT INTO time(hour, level, descr)
            VALUES(
                :hour,
                :lvl,
                :descr)';
                
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
            

            // Insertion Horaire 2 dans le cours
            $querySelectTime =
            'SELECT
                id
            FROM
                time;';
            $queryInsertClassTime =
            'UPDATE
                cours
            SET
                hour_2 = :hour
            WHERE
                cours.id = :cours;';

            try {
                $allTimes = $db->findAll($querySelectTime, []);
            } catch (PDOException $e) {
                die;
            }
            foreach ($allTimes as $key) {
                $idTime = $key['id'];
            }

            try {
                $db->executeSql($queryInsertClassTime, [':hour'=>$idTime, ':cours'=>$_GET['id']]);
            } catch (PDOException $e) {
                die;
            }
        }
        // On verifie si $_post est vide et si la valeur hour_1 n'est pas vide
        if ($time3['hour'] == '' && $_POST['hour_3'] !== '') {
            $queryTime =
            'INSERT INTO time(hour, level, descr)
            VALUES(
                :hour,
                :lvl,
                :descr)';
                
            // Ajout Horaire 1 dans la table Time
            try {
                $db->executeSql($queryTime, [
                ':hour' => $_POST['hour_3'].':00',
                ':lvl' => $_POST['hour_3_lvl'],
                ':descr' => $_POST['hour_3_info']
            ]);
            } catch (PDOException $e) {
                die;
            }
            

            // Insertion Horaire 1 dans le cours
            $querySelectTime =
            'SELECT
                id
            FROM
                time;';
            $queryInsertClassTime =
            'UPDATE
                cours
            SET
                hour_3 = :hour
            WHERE
                cours.id = :cours;';

            try {
                $allTimes = $db->findAll($querySelectTime, []);
            } catch (PDOException $e) {
                die;
            }
            foreach ($allTimes as $key) {
                $idTime = $key['id'];
            }

            try {
                $db->executeSql($queryInsertClassTime, [':hour'=>$idTime, ':cours'=>$_GET['id']]);
            } catch (PDOException $e) {
                die;
            }
        }
        // modification des horaires
        
        // On verifie si $_post est vide et si la valeur hour_1 n'est pas vide
        if ($_POST['hour_1'] !== $time1['hour'] && $time1['id'] !== '') {
            // modif Horaire 1 dans la table Time
            try {
                $queryTime =
        'UPDATE time
        SET
            hour = :hour,
            level = :lvl,
            descr = :descr
        WHERE
            id = :id';
                $db->executeSql($queryTime, [
                ':hour' => $_POST['hour_1'].':00',
                ':lvl' => $_POST['hour_1_lvl'],
                ':descr' => $_POST['hour_1_info'],
                ':id' => $time1['id']
            ]);
            } catch (PDOException $e) {
                die;
            }
        }
        if ($_POST['hour1']== '') {
            $query =
        "DELETE FROM
                time
            WHERE
                id = :id
        ";
            $ex = $db->executeSql($query, [
            ':id' => $time1['id']
        ]);
            $query =
        'UPDATE cours
        SET hour_1 = NULL
        WHERE id = :id';
            $ex = $db->executeSql($query, [
            ':id' => $_GET['id']
        ]);
        }
        // On verifie si $_post est vide et si la valeur hour_1 n'est pas vide
        if ($_POST['hour_2'] !== $time2['hour']) {
            // modif Horaire 2 dans la table Time
            try {
                $db->executeSql($queryTime, [
                ':hour' => $_POST['hour_2'].':00',
                ':lvl' => $_POST['hour_2_lvl'],
                ':descr' => $_POST['hour_2_info'],
                ':id' => $time2['id']
            ]);
            } catch (PDOException $e) {
                die;
            }
        }
        if ($_POST['hour2']== '' && $time2['id'] !== '') {
            $query =
        "DELETE FROM
                time
            WHERE
                id = :id
        ";
            $ex = $db->executeSql($query, [
            ':id' => $time1['id']
        ]);
            $query =
        'UPDATE cours
        SET hour_2 = NULL
        WHERE id = :id';
            $ex = $db->executeSql($query, [
            ':id' => $_GET['id']
        ]);
        }
        if ($_POST['hour_3'] !== $time3['hour']) {
            // Ajout Horaire 3 dans la table Time
            try {
                $db->executeSql($queryTime, [
                ':hour' => $_POST['hour_3'].':00',
                ':lvl' => $_POST['hour_3_lvl'],
                ':descr' => $_POST['hour_3_info'],
                ':id' => $time3['id']
            ]);
            } catch (PDOException $e) {
                die;
            }
        }
        // On verifie si $_post est vide et si la valeur hour_1 n'est pas vide
        if ($_POST['hour2']== '' && $time2['id'] !== '') {
            $query =
        "DELETE FROM
                time
            WHERE
                id = :id
        ";
            $ex = $db->executeSql($query, [
            ':id' => $time1['id']
        ]);
            $query =
        'UPDATE cours
        SET hour_1 = NULL
        WHERE id = :id';
            $ex = $db->executeSql($query, [
            ':id' => $_GET['id']
        ]);
        }
        // Ajout de l'image
        $file = $_FILES;
        // On verifie si l'image existe dans la table
        if ($file['img']['name'] != null) {
            $fImg = uploadImg($file);
            $queryFile =
            "UPDATE images SET name = :name, extension = :ext, alt = :alt, id_page = 1) WHERE id = :id;";

            try {
                $db->executeSql($queryFile, [
                ':name' => $fImg['nom'],
                ':ext' => $fImg['ext'],
                ':alt' => $_POST['alt_img'],
                ':id' => $cour['id_img']
            ]);
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
